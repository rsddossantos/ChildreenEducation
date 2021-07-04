function confirm(msg, action) {
    let modalConfirm = function(callback){
        $("#confirm").modal('show');
        $("#myModalLabel").html(msg);
        $("#modal-btn-si").on("click", function(){
            callback(true);
            $("#confirm").modal('hide');
        });
        $("#modal-btn-no").on("click", function(){
            callback(false);
            $("#confirm").modal('hide');
        });
    };
    modalConfirm(function(confirm){
        if(confirm){
            window.location.href = action;
        }
    });
}

