$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    var editor = new $.fn.dataTable.Editor({
        ajax: "/users",
        table: "#users",
        display: "bootstrap",
        fields: [
            {label: "Name:", name: "name"},
            {label: "Email:", name: "email"},
            {label: "Password:", name: "password", type: "password"}
        ]
    });

    $('#users').on('click', 'tbody td:not(:first-child)', function (e) {
        editor.inline(this);
    });

    {{$dataTable->generateScripts()}}
})