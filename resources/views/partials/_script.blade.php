<script src="{!! asset('bower_components/MDBootstrap/js/jquery-3.3.1.min.js') !!}"></script>
<script src="{!! asset('bower_components/MDBootstrap/js/popper.min.js') !!}"></script>
<script src="{!! asset('bower_components/MDBootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('bower_components/MDBootstrap/js/mdb.min.js') !!}"></script>
<script src="{!! asset('bower_components/MDBootstrap/js/addons/datatables.min.js') !!}"></script>
<script src="{!! asset('bower_components/Font-Awesome/svg-with-js/js/fontawesome-all.min.js') !!}"></script>
<script src="{!! asset('bower_components/ckeditor5-build-classic/build/ckeditor.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    var allEditors = document.querySelectorAll('.editor');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(allEditors[i], {
            autoParagraph: false,
            enterMode: 'br',
            ShiftEnterMode: 'br',
        });
    }
</script>
