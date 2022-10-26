<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SistemaController extends Controller
{
    public function index(){
        return view("sistema.index");
    }

    public function api(){
        $hospital = auth()->user()->hospital;
        
        $zip = new \ZipArchive;
        $out = new \stdClass;
        $days = 365 * 3;
        $certname = "certificados";
        $passphrase = "";
        $config=array(
            'private_key_bits'  =>  4096,
            'private_key_type'  =>  OPENSSL_KEYTYPE_RSA,
            'encrypt_key'       =>  false
        );
        $dn=[
            "countryName"               => "MX",
            "stateOrProvinceName"       => $hospital->estado,
            "localityName"              => $hospital->ciudad,
            "organizationName"          => $hospital->nombre,
            "organizationalUnitName"    => $hospital->nombre,
            "commonName"                => $hospital->user,
            "emailAddress"              => $hospital->email
        ];

        $CAcert = Storage::disk('s3')->get('CA.crt');
        $CAPK = Storage::disk('s3')->get('CA.key');

        $privkey = openssl_pkey_new( $config );
        $csr = openssl_csr_new( $dn, $privkey, $config );
        $cert = openssl_csr_sign( $csr, $CAcert, $CAPK, $days, $config, 0 );
        openssl_x509_export( $cert, $out->pub );
        openssl_pkey_export( $privkey, $out->priv, $passphrase );
        openssl_csr_export( $csr, $out->csr );

        $pk=$out->priv;
        $cert=$out->pub;
        $csr=$out->csr;

        $zip = new \ZipArchive();
        $name = public_path('storage') . "temp" . microtime(true) . ".zip";
        $zip->open($name , \ZipArchive::CREATE);
        $zip->addFromString($certname.".key", $pk);
        $zip->addFromString($certname.".crt", $cert);
        $zip->addFromString($certname.".csr", $csr);
        $zip->addFromString("CA.crt", $CAcert);
        $zip->close();
        $data = file_get_contents($name);
        unlink($name);
        return response()->streamDownload(function () use ($data) { echo $data; }, 'certs.zip');
    }
}
