let table = $('#gardenersTable').DataTable({
    responsive: true,
    ajax: {
        'url': '/api/gardener',
        'type': 'GET',
        // cache: false,
        dataSrc: ''
    },
    columns: [{
            data: 'id'
        },
        {
            data: 'firstname',
            "render": function (data, type, row, meta) {
                return '<a href="/api/gardener/' + row['id'] + '">' + data + '</a>';
            }
        },
        {
            data: 'created_at'
        },
        // { data: 'updated_at' },

    ]
});
