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
        {
            data: 'customers_count'
        },
        {
            data: 'gardeners_count'
        }
    ]
});

function getCountries() {
    document.getElementById("countryName").innerHTML = "";

    axios.get('/api/country')
        .then(function (response) {
            var select = document.getElementById("countryName");

            response.data.map(country => {
                opt = document.createElement("option");
                opt.value = country.id;
                opt.textContent = country.name;
                select.appendChild(opt);
            })
        })
        .catch(function (error) {
            console.log(error);
        });
}

function saveNewCountry() {
    var select = document.getElementById('countryName');
    var country_id = select.options[select.selectedIndex].value;
    axios.post('/api/location', {
            "name": document.getElementById('locationName').value,
            "country_id": country_id
        })
        .then(function (response) {
            console.log(response.data);
            table.ajax.reload();

        })
        .catch(function (error) {
            console.log(error);
        });
}
document.getElementById('newLocationButton').addEventListener('click', getCountries);
document.getElementById('saveNewLocationButton').addEventListener('click', (e) => {
    e.preventDefault();
    saveNewCountry();
});
// getCountries();
