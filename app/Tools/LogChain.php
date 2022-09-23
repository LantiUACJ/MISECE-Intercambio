<?php 
namespace App\Tools;

use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Contract;
use App\Models\Log;
use Web3p\EthereumTx\Transaction;


class LogChain{
    function __construct(){
        $this->abi = "[{\"anonymous\":false,\"inputs\":[{\"indexed\":false,\"internalType\":\"string\",\"name\":\"dat\",\"type\":\"string\"}],\"name\":\"dataAdded\",\"type\":\"event\"},{\"inputs\":[{\"internalType\":\"string\",\"name\":\"payload\",\"type\":\"string\"},{\"internalType\":\"bytes32\",\"name\":\"ID\",\"type\":\"bytes32\"}],\"name\":\"addRecord\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"success\",\"type\":\"bool\"}],\"stateMutability\":\"nonpayable\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"dataId\",\"outputs\":[{\"internalType\":\"bytes32\",\"name\":\"\",\"type\":\"bytes32\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"bytes32\",\"name\":\"\",\"type\":\"bytes32\"}],\"name\":\"facts\",\"outputs\":[{\"internalType\":\"string\",\"name\":\"payload\",\"type\":\"string\"},{\"internalType\":\"uint256\",\"name\":\"listPointer\",\"type\":\"uint256\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"getAllRecords\",\"outputs\":[{\"internalType\":\"string[]\",\"name\":\"payloads\",\"type\":\"string[]\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"bytes32\",\"name\":\"id\",\"type\":\"bytes32\"}],\"name\":\"getRecord\",\"outputs\":[{\"internalType\":\"string\",\"name\":\"payload\",\"type\":\"string\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"getRecordCount\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"recCount\",\"type\":\"uint256\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"bytes32\",\"name\":\"recordAddress\",\"type\":\"bytes32\"}],\"name\":\"isRecord\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"isRec\",\"type\":\"bool\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[],\"name\":\"numberOfRecords\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"stateMutability\":\"view\",\"type\":\"function\"},{\"inputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"name\":\"recordsList\",\"outputs\":[{\"internalType\":\"bytes32\",\"name\":\"\",\"type\":\"bytes32\"}],\"stateMutability\":\"view\",\"type\":\"function\"}]";
        $this->bytecode = "0x6080604052600060015534801561001557600080fd5b50610ec1806100256000396000f3fe608060405234801561001057600080fd5b50600436106100935760003560e01c8063a7f9fe7211610066578063a7f9fe7214610146578063c0378e6214610164578063c8a663ec14610195578063ca267f28146101b3578063e8d7873e146101d157610093565b8063213681cd14610098578063308631e1146100c85780636f1ec372146100f8578063966a777b14610116575b600080fd5b6100b260048036038101906100ad9190610769565b610201565b6040516100bf919061082f565b60405180910390f35b6100e260048036038101906100dd9190610986565b6102f1565b6040516100ef91906109fd565b60405180910390f35b6101006103de565b60405161010d9190610a31565b60405180910390f35b610130600480360381019061012b9190610769565b6103e4565b60405161013d91906109fd565b60405180910390f35b61014e61043a565b60405161015b9190610b58565b60405180910390f35b61017e60048036038101906101799190610769565b610599565b60405161018c929190610b7a565b60405180910390f35b61019d610645565b6040516101aa9190610bb9565b60405180910390f35b6101bb61064b565b6040516101c89190610a31565b60405180910390f35b6101eb60048036038101906101e69190610c00565b610658565b6040516101f89190610bb9565b60405180910390f35b606061020c826103e4565b61024b576040517f08c379a000000000000000000000000000000000000000000000000000000000815260040161024290610c9f565b60405180910390fd5b60036000838152602001908152602001600020600001805461026c90610cee565b80601f016020809104026020016040519081016040528092919081815260200182805461029890610cee565b80156102e55780601f106102ba576101008083540402835291602001916102e5565b820191906000526020600020905b8154815290600101906020018083116102c857829003601f168201915b50505050509050919050565b60006102fc826103e4565b1561033c576040517f08c379a000000000000000000000000000000000000000000000000000000000815260040161033390610d91565b60405180910390fd5b8260036000848152602001908152602001600020600001908051906020019061036692919061067c565b50600282908060018154018082558091505060019003906000526020600020016000909190919091505560016002805490506103a29190610de0565b6003600084815260200190815260200160002060010181905550600160008154809291906103cf90610e14565b91905055506001905092915050565b60015481565b600080600280549050036103fb5760009050610435565b81600260036000858152602001908152602001600020600101548154811061042657610425610e5c565b5b90600052602060002001541490505b919050565b6060600060015467ffffffffffffffff81111561045a5761045961085b565b5b60405190808252806020026020018201604052801561048d57816020015b60608152602001906001900390816104785790505b50905060005b60015481101561059157600060036000600284815481106104b7576104b6610e5c565b5b9060005260206000200154815260200190815260200160002090508060000180546104e190610cee565b80601f016020809104026020016040519081016040528092919081815260200182805461050d90610cee565b801561055a5780601f1061052f5761010080835404028352916020019161055a565b820191906000526020600020905b81548152906001019060200180831161053d57829003601f168201915b505050505083838151811061057257610571610e5c565b5b602002602001018190525050808061058990610e14565b915050610493565b508091505090565b60036020528060005260406000206000915090508060000180546105bc90610cee565b80601f01602080910402602001604051908101604052809291908181526020018280546105e890610cee565b80156106355780601f1061060a57610100808354040283529160200191610635565b820191906000526020600020905b81548152906001019060200180831161061857829003601f168201915b5050505050908060010154905082565b60005481565b6000600280549050905090565b6002818154811061066857600080fd5b906000526020600020016000915090505481565b82805461068890610cee565b90600052602060002090601f0160209004810192826106aa57600085556106f1565b82601f106106c357805160ff19168380011785556106f1565b828001600101855582156106f1579182015b828111156106f05782518255916020019190600101906106d5565b5b5090506106fe9190610702565b5090565b5b8082111561071b576000816000905550600101610703565b5090565b6000604051905090565b600080fd5b600080fd5b6000819050919050565b61074681610733565b811461075157600080fd5b50565b6000813590506107638161073d565b92915050565b60006020828403121561077f5761077e610729565b5b600061078d84828501610754565b91505092915050565b600081519050919050565b600082825260208201905092915050565b60005b838110156107d05780820151818401526020810190506107b5565b838111156107df576000848401525b50505050565b6000601f19601f8301169050919050565b600061080182610796565b61080b81856107a1565b935061081b8185602086016107b2565b610824816107e5565b840191505092915050565b6000602082019050818103600083015261084981846107f6565b905092915050565b600080fd5b600080fd5b7f4e487b7100000000000000000000000000000000000000000000000000000000600052604160045260246000fd5b610893826107e5565b810181811067ffffffffffffffff821117156108b2576108b161085b565b5b80604052505050565b60006108c561071f565b90506108d1828261088a565b919050565b600067ffffffffffffffff8211156108f1576108f061085b565b5b6108fa826107e5565b9050602081019050919050565b82818337600083830152505050565b6000610929610924846108d6565b6108bb565b90508281526020810184848401111561094557610944610856565b5b610950848285610907565b509392505050565b600082601f83011261096d5761096c610851565b5b813561097d848260208601610916565b91505092915050565b6000806040838503121561099d5761099c610729565b5b600083013567ffffffffffffffff8111156109bb576109ba61072e565b5b6109c785828601610958565b92505060206109d885828601610754565b9150509250929050565b60008115159050919050565b6109f7816109e2565b82525050565b6000602082019050610a1260008301846109ee565b92915050565b6000819050919050565b610a2b81610a18565b82525050565b6000602082019050610a466000830184610a22565b92915050565b600081519050919050565b600082825260208201905092915050565b6000819050602082019050919050565b600082825260208201905092915050565b6000610a9482610796565b610a9e8185610a78565b9350610aae8185602086016107b2565b610ab7816107e5565b840191505092915050565b6000610ace8383610a89565b905092915050565b6000602082019050919050565b6000610aee82610a4c565b610af88185610a57565b935083602082028501610b0a85610a68565b8060005b85811015610b465784840389528151610b278582610ac2565b9450610b3283610ad6565b925060208a01995050600181019050610b0e565b50829750879550505050505092915050565b60006020820190508181036000830152610b728184610ae3565b905092915050565b60006040820190508181036000830152610b9481856107f6565b9050610ba36020830184610a22565b9392505050565b610bb381610733565b82525050565b6000602082019050610bce6000830184610baa565b92915050565b610bdd81610a18565b8114610be857600080fd5b50565b600081359050610bfa81610bd4565b92915050565b600060208284031215610c1657610c15610729565b5b6000610c2484828501610beb565b91505092915050565b7f7265636f72642077697468207468697320696420646f6573206e6f742065786960008201527f7374000000000000000000000000000000000000000000000000000000000000602082015250565b6000610c896022836107a1565b9150610c9482610c2d565b604082019050919050565b60006020820190508181036000830152610cb881610c7c565b9050919050565b7f4e487b7100000000000000000000000000000000000000000000000000000000600052602260045260246000fd5b60006002820490506001821680610d0657607f821691505b602082108103610d1957610d18610cbf565b5b50919050565b7f7265636f72642077697468207468697320696420616c7265616479206578697360008201527f7473000000000000000000000000000000000000000000000000000000000000602082015250565b6000610d7b6022836107a1565b9150610d8682610d1f565b604082019050919050565b60006020820190508181036000830152610daa81610d6e565b9050919050565b7f4e487b7100000000000000000000000000000000000000000000000000000000600052601160045260246000fd5b6000610deb82610a18565b9150610df683610a18565b925082821015610e0957610e08610db1565b5b828203905092915050565b6000610e1f82610a18565b91507fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff8203610e5157610e50610db1565b5b600182019050919050565b7f4e487b7100000000000000000000000000000000000000000000000000000000600052603260045260246000fdfea26469706673582212205070a2d434a6617292598db3f035e792efb0592eb0ce497e3b2d97348c185ad564736f6c634300080d0033";
        $this->loop = 0;
        $this->chainId = 1338;
        $this->account = env("BLOCKCHAIN_ACCOUNT");
        $this->pk = env("BLOCKCHAIN_PRIVATE");
        $this->contractAddress = "0xd5a5b621f0ed51a1dc090b279eaf6c570b4752bd";
        $this->ip = env("BLOCKCHAIN_URL");
        //$this->ip = 'HTTP://127.0.0.1:7545'; // 'http://54.145.158.149:8545' ganache
    }

    function store($log){
        //dd($log);
        $start = microtime(true);
        $provider = new HttpProvider(new HttpRequestManager($this->ip, 15));
        $contract = new Contract($provider, $this->abi);
        $data = [
            "fecha"=> $log->fecha,
            "paciente"=>$log->paciente,
            "hospital"=>$log->hospital,
            "consultor"=>$log->consultor,
            "respuestas"=>auth()->user()->id
        ];
        $data = json_encode($data);
        $rawTransactionData = '0x' . $contract->getData('addRecord', $data, bin2hex($log->id));
        $transactionParams = [
            'nonce' => "0x" . dechex($log->id),
            'from' => $this->account,
            'to' =>  $this->contractAddress,
            'gasPrice' =>  '0x' . dechex(300000000000),
            'value' => '0x0',
            'data' => $rawTransactionData,
            'gasLimit' => "0x". dechex(15000000),
            'chainId' => $this->chainId
        ];
        $tx = new Transaction($transactionParams);
        $signedTx = '0x' . $tx->sign($this->pk);
        $txHash = "";
        $exito = true;
        $contract->eth->sendRawTransaction($signedTx, function ($err, $txResult) use (&$txHash, &$exito) {
            if($err) {
                $txHash = $err->getMessage();
                $exito = false;
            }
            else{
                $txHash = $txResult;
            }
        });
        //echo "[". (number_format(microtime(true) - $start,4)*1000) . " Milisegundos]";
        if(!$exito){
            //dd($txHash);
        }
        elseif(strpos($txHash,"0x")!== false){
            $log->txhash = $txHash;
            $log->save();
        }
    }

    function find($id){
        $provider = new HttpProvider(new HttpRequestManager($this->ip, 15));
        $contract = new Contract($provider, $this->abi);
        $data = "";
        $contract->at($this->contractAddress)->call("getRecord", bin2hex($id), function($err, $succ) use(&$data){
            if(!$err) $data = $succ;
            else $data = "Error";
        });
        if($data != "Error")
            return $data["payload"];
        else
            return "Error";
    }

    function errorFreeTransaction($nonce = 0){
        $start = microtime(true);
        $provider = new HttpProvider(new HttpRequestManager($this->ip, 15));
        $contract = new Contract($provider, $this->abi);
        $transactionCount = new class{ public function toString(){}};
        if($nonce == 0){
            $contract->eth->getTransactionCount($this->account, function ($err, $transactionCountResult) use(&$transactionCount) {
                if($err) {
                    dd($err);
                    throw new \RuntimeException($err->getMessage());
                }
                $transactionCount = $transactionCountResult;
            });
            $transactionCount = (int) $transactionCount->toString();
            $nonce = $transactionCount;
            echo "current: " . $nonce. "<br>";
        }
        else{
            $transactionCount = $nonce;
            echo "nonce: " . $nonce. "<br>";
        }
        
        $id = "erfr-".$nonce;
        $data = [
            "fecha"=> \Carbon\Carbon::now()->addSecond($nonce)->format("Y-m-d H:i:s"),
            "paciente"=>"MEJDH3H837471(" . $id.")",
            "hospital"=>"php laravel-turbo #3",
            "consultor"=>"DR. Adrian Olmos Leon",
            "respuestas"=>"HOSPITAL DE PRUEBA #2, HOSPITAL DE PRUEBA #1, HOSPITAL DE PRUEBA #47816384"
        ];
        $data = json_encode($data);
        $rawTransactionData = '0x' . $contract->getData('addRecord', $data, bin2hex($id));
        $transactionParams = [
            'nonce' => "0x" . dechex($transactionCount),
            'from' => $this->account,
            'to' =>  $this->contractAddress,
            'gasPrice' =>  '0x' . dechex(300000000000),
            'value' => '0x0',
            'data' => $rawTransactionData,
            'gasLimit' => "0x". dechex(15000000),
            'chainId' => $this->chainId
        ];
        $tx = new Transaction($transactionParams);
        $signedTx = '0x' . $tx->sign($this->pk);
        $txHash = "";
        $contract->eth->sendRawTransaction($signedTx, function ($err, $txResult) use (&$txHash, $data) {
            if($err) {
                $txHash = "Error";//$err->getMessage();
            }
            else{
                $txHash = $txResult;
            }
        });
        echo (number_format(microtime(true) - $start,4)*1000) . " Milisegundos";
        if($this->loop > 100){
            dd($data);
        }
        else{
            $this->loop++;
        }
        if($txHash === "Error"){
            $this->errorFreeTransaction(++$nonce);
        }
        elseif(strpos($txHash,"0x")!== false){
            echo $txHash . "<br>";
        }
        
    }

    function getTransactionCountAcc(){
        $provider = new HttpProvider(new HttpRequestManager($this->ip, 15));
        $contract = new Contract($provider, $this->abi);
        $txCount = new class {function toString(){}};
        $contract->eth->getTransactionCount($this->account, function ($err, $transactionCountResult) use(&$txCount) {
            if($err) {
                //dd($err);
                throw new \RuntimeException($err->getMessage());
            }
            $txCount = $transactionCountResult;
        });
        return (int) $txCount->toString();
    }

    function deploy(){
        $provider = new HttpProvider(new HttpRequestManager($this->ip, 15));
        $contract = new Contract($provider, $this->abi);
        $tx = new Transaction([
            'nonce' => "0x" . dechex($this->getTransactionCountAcc()),
            'from' => $this->account,
            'gasPrice' =>  '0x' . dechex(300000000000),
            'value' => '0x0',
            'data' => $this->bytecode,
            'gasLimit' => "0x". dechex(15000000),
            'chainId' => $this->chainId
        ]);
        $signedTx = '0x' . $tx->sign($this->pk);
        $txHash = "";
        $contract->eth->sendRawTransaction($signedTx, function ($err, $txResult) use (&$txHash) {
            if($err) {
                $txHash = $err->getMessage();
            }
            else{
                $txHash = $txResult;
            }
        });
        $txReceipt = new class{};

        for ($i=0; $i <= 9000; $i++) {
            $contract->eth->getTransactionReceipt($txHash, function ($err, $txReceiptResult) use(&$txReceipt) {
                if($err) {
                    Log::error('getTransactionReceipt error: ' . $err->getMessage());
                    throw new \RuntimeException($err->getMessage());
                }
                $txReceipt = $txReceiptResult;
            });
            if ($txReceipt) {
                break;
            }
            sleep(1);
        }
        $this->contractAddress = $txReceipt->contractAddress;
        return $this->contractAddress;
    }
}