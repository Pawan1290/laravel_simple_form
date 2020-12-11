<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    @yield('content')

    <script>
        $("#ajaxform").submit(function(event) {
            event.preventDefault();
            var id = $("#formId").val();
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var address = $("textarea#address").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var key = $("#lastKey").val();

            $.post('/formStore/' + id, {
                    "firstName": firstName,
                    "lastName": lastName,
                    "address": address,
                    "email": email,
                    "phone": phone,
                    "key": key,
                    "_token": "{{ csrf_token() }}"
                },
                function(data) {
                    var res = JSON.parse(data);
                    if (res['type'] == 'insert') {
                        $("#defaultData").empty();
                        $("#formTable tbody").append(res['data']);
                        $("#lastKey").val(parseInt(key) + 1);
                    } else {
                        var tableData = res['data'];
                        $("#" + id + " td#firstName").html(tableData['firstName']);
                        $("#" + id + " td#lastName").html(tableData['lastName']);
                        $("#" + id + " td#address").html(tableData['address']);
                        $("#" + id + " td#email").html(tableData['email']);
                        $("#" + id + " td#phone").html(tableData['phone']);
                    }
                    $("#ajaxform")[0].reset();
                    $("#formId").val('');
                });
        });
        $("#ajaxform").on('reset', function(){
            $("#formId").val('');
        });
        function update(id) {
            $("#formId").val(id);
            $("#firstName").val($("#" + id + " td#firstName").html());
            $("#lastName").val($("#" + id + " td#lastName").html());
            $("textarea#address").val($("#" + id + " td#address").html());
            $("#email").val($("#" + id + " td#email").html());
            $("#phone").val($("#" + id + " td#phone").html());
        }
    </script>
</body>

</html>