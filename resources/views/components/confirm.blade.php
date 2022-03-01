<script>
    function confirmModal(title,target){
        $("#title").html(title);
        $("#form").attr("action",target);
        $("#confirm").modal();
    }
</script>

<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="form" method="post">
                    <div id="msg"></div>
                    @csrf
                    <input type="submit" value="Confirmar" class="btn btn-success">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>