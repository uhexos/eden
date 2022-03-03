let table = $('#locationsTable').DataTable({
    responsive: true,
    ajax: {
        'url': '/api/location',
        'type': 'GET',
        // cache: false,
        dataSrc: ''
    },
    columns: [{
            data: 'id'
        },
        {
            data: 'name',
            render: function (data, type, row, meta) {
                return '<a href="/api/location/' + row['id'] + '">' + data + '</a>';
            }
        },
        // {
        //     data: 'created_at'
        // },
        // { data: 'updated_at' },

    ]
});
