<script>
    $(document).ready(function() {
        $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            showConfirm(event.currentTarget);
            showModalConfirm(event.currentTarget);
        })
    });

    function showConfirm(e) {
        Swal.fire({
            title: 'Are you sure?',
            html: "<p>Delete <b>" + $(e).data('name') + "</b></p> <p>You won't be able to revert this!</p>",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#3085d6',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                ajaxDelete(e);
            }
        });
    }

    function ajaxDelete(e) {
        var url = $(e).prop('href');
        var id = $(e).data('id');
        $.ajax({
            method: "POST",
            url: url,
            data: {
                id: id
            }
        }).done(function(response) {
            let reload_url = $(e).data('return-url');
            let target = $('#hoadon-list');
            reloadCityList(reload_url, target);
            Swal.fire(
                'Deleted!',
                response.message,
                'success'
            );

        }).fail(function(response) {
            Swal.fire(
                'Error',
                response.responseJSON.message,
                'error'
            )
        });
    }

    function reloadCityList(url, target) {
        $.ajax({
            method: 'GET',
            url: url
        }).done(function(response) {
            $(target).html(response.data);
        }).fail(function() {
            Swal.fire(
                'Error',
                'Unable to reload the Ward list. Try again.',
                'error'
            )
        });
    }

    function showModalConfirm(e) {
        var deleteModal = new bootstrap.Modal($('#confirmDeleteModal'), {
            keyboard: false
        });
        let url = $(e).prop('href');
        $("#deleteForm").prop('action', url);
        $("#loaisanpham-id").val($(e).data('id'));
        $("#return-url").val($(e).data('return-url'));
        let msg = 'Are you sure you want to delete ' + $(e).data('name') + '?';
        $("#delete-message").text(msg);
        deleteModal.show();
    }
</script>