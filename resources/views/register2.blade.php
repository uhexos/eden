<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Profile</h3>
                                </div>
                                <div class="card-body">
                                    <form id="registerForm">
                                        <input type="text" id="inputName">

                                        <div class="form-floating mb-3">
                                            <div class="mb-3">
                                                <label for="inputLocation" class="form-label">Location</label>
                                                <select class="form-select" name="inputLocation" id="inputLocation">
                                                    <option selected>Select Location</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputCountry" class="form-label">Country</label>
                                                <select class="form-select" name="inputCountry" id="inputCountry">
                                                    <option selected>Select Country</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><input type="submit"
                                                    class="btn btn-primary btn-block" value='Save profile'></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    {{-- <div class="small"><a href="/">Have an account? Go to login</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            event.preventDefault()
            // axios.get('/sanctum/csrf-cookie').then(response => {

            // });
            var select = document.getElementById('inputLocation');
            var location_id = select.options[select.selectedIndex].value;
            var select2 = document.getElementById('inputCountry');
            var country_id = select2.options[select.selectedIndex].value;
            axios.post('api/customer', {
                    firstname: document.getElementById('inputName').value,
                    lastname: document.getElementById('inputName').value,
                    country_id: country_id,
                    location_id: location_id
                })
                .then(function(response) {
                    window.location.href = "/dashboard";
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    alert(error);
                });
        });
        axios.get('api/user')
            .then((response) => {
                // must log out to register =
                !response.data.name ? window.location.href = "/" : "";
                document.getElementById('inputName').value = response.data.name;
            })
            .catch(function(error) {
                // if no user is logged in attempt to login
                login()
            });

        function getCountries() {
            document.getElementById("inputCountry").innerHTML = "";

            axios.get('api/country')
                .then(function(response) {
                    var select = document.getElementById("inputCountry");

                    response.data.map(country => {
                        opt = document.createElement("option");
                        opt.value = country.id;
                        opt.textContent = country.name;
                        select.appendChild(opt);
                    })
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function getLocations() {
            document.getElementById("inputLocation").innerHTML = "";

            axios.get('api/location')
                .then(function(response) {
                    var select = document.getElementById("inputLocation");
                    response.data.map(country => {
                        opt = document.createElement("option");
                        opt.value = country.id;
                        opt.textContent = country.name;
                        select.appendChild(opt);
                    })
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
        getCountries();
        getLocations()
    </script>
</body>

</html>
