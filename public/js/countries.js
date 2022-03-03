let table = $('#countriesTable').DataTable({
    responsive: true,
    ajax: {
        'url': '/api/country',
        'type': 'GET',

        // cache: false,
        dataSrc: ''
    },
    columns: [{
            data: 'id'
        },
        {
            data: 'name',
            "render": function (data, type, row, meta) {
                return '<a href="/api/country/' + row['id']  + '">' + data + '</a>';
            }
        },
        // { data: 'created_at' },
        // { data: 'updated_at' },

    ]
});
