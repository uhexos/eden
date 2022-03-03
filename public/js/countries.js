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
            render: function (data, type, row, meta) {
                return '<a href="/api/country/' + row['id'] + '">' + data + '</a>';
            }
        },
        // {
        //     data: 'created_at'
        // },
        // { data: 'updated_at' },

    ]
});

function saveNewCountry() {   
    axios.post('/api/country', {
            "name": document.getElementById('countryName').value,
        })
        .then(function (response) {
            console.log(response.data);
            table.ajax.reload();
        })
        .catch(function (error) {
            console.log(error);
        });
}

document.getElementById('saveNewCountryButton').addEventListener('click', (e) => {
    e.preventDefault();
    saveNewCountry();
});