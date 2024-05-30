$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var examId = button.data('id');

    $.ajax({
        url: 'get_exam.php',
        type: 'GET',
        data: {id: examId},
        success: function(data) {
            $('#editModal .modal-body').html(data);
        }
    });
});

function confirmDelete(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet examen?")) {
        window.location.href = "exam.php?deletex=" + id;
    }
}
