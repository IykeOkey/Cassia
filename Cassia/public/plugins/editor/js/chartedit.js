$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    var editor = new $.fn.dataTable.Editor({
        ajax: "/chartedit",
        table: "#charts",
        display: "bootstrap",
        fields: [
            {label: "Cadre Code:", name: "cadre_code"},
            {label: "Basic PA:", name: "basicpa"},
            {label: "Basic PM:", name: "basicpm"},
            {label: "Rent:", name: "rent"},
            {label: "Transport:", name: "trans"},
            {label: "meal:", name: "meal"},
            {label: "Utility:", name: "util"},
            {label: "Entert'ment:", name: "enter"},
            {label: "Dom Staff:", name: "domestic"}
        ]
    });

    $('#charts').on('click', 'tbody td:not(:first-child)', function (e) {
        editor.inline(this);
    });

    {{$dataTable->generateScripts()}}
})