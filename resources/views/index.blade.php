<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
</head>

<body class="bg-light">
    <div class="m-3">
        <div class="bg-white rounded border p-3">
            <h1>PHP AJAX ASSIGNENT</h1>
            <p>
                <span>Select a province </span>
                <select id="select-province" class="form-control">
                    <option value="Western">Western Province</option>
                    <option value="Northern">Northern Province</option>
                    <option value="Southern">Southern Province</option>
                    <option value="Eastern">Eastern Province</option>
                    <option value="Kigali">Kigali City</option>
                </select>
            </p>
            <p>
            <div id="output" class="d-none">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Province</th>
                            <th>District</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="loading" class="d-flex gap-3">
                <div class="spinner-border text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="fw-bold">Fetching data ...</p>
            </div>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <script>
        const select = $("#select-province")
        const loader = $("#loading")
        const output = $("#output")
        loader.addClass('d-none')

        select.change((event) => call_api(event.target.value))

        function call_api(province) {
            const url = `http://localhost:8000/api/region/${province}`
            // jquery ajax
            $.ajax({
                url: url,
                "method": "GET",
                beforeSend: () => {
                    loader.removeClass('d-none')
                    output.addClass('d-none')
                },
                success: data => {
                    loader.addClass('d-none')
                    output.removeClass('d-none')
                    updateDOM(data)
                },
                error: (error) => console.error(error)
            })
        }

        function updateDOM(data) {
            output.removeClass('d-none')
            const tbody = $("#output table tbody")
            tbody.html("")
            data.forEach(region => {
                const tr = $("<tr>")
                const td1 = $("<td>")
                td1.text(region.province)
                const td2 = $("<td>")
                td2.text(region.district)
                tr.append(td1)
                tr.append(td2)
                tbody.append(tr)
            })
        }

    </script>

</body>

</html>