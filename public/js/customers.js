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
                return '<a href="/customers/' + row['id'] + '">' + data + '</a>';
            }
        },
        {
            data: 'created_at'
        },
        // { data: 'updated_at' },

    ]
});

let path = window.location.pathname.split('/');

if (path[2]) {
    axios.get('/api/customer/'+path[2])
        .then(function (response) {
            document.getElementById('name').value = response.data.firstname + response.data.lastname
            document.getElementById('gardener').value = response.data.gardeners[0].firstname
            document.getElementById('location').value = response.data.location.name
            document.getElementById('country').value = response.data.country.name
        })
        .catch(function (error) {
            console.log(error);
        });
}
