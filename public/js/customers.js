let table = $('#customersTable').DataTable({
    responsive: true,
    ajax: {
        'url': '/api/customer',
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
                return '<a href="/api/country/' + row['id']  + '">' + data + '</a>';
            }
        },
        { data: 'created_at' },
        // { data: 'updated_at' },

    ]
});
