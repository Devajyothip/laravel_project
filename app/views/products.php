<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
body  {
background-color: #cccccc;
}
</style>


<body>

<div class="container">
    <center>
        <h1>Welcome to My Web Page</h1>

        <form id="myForm" method="post" target="_parent">


        <p>Product name:
            <input type="text" name="Product name" value="" maxlength="200" size="60" id="id1">
        </p>

        <p>Quantity in stock:
            <input type="text" name="Quantity in stock" value="" maxlength="200" size="60" id="id2">
        </p>
        <p>Price per item:
            <input type="text" name="Price per item" value="" maxlength="200" size="60" id="id3">
        </p>

        <p>
            <input id="submit" type="button" value="Submit" name="submit">
        </p>

    </form>
    </center>

    <table id ="myTable" style="width:100%">
        <thead>
        <tr>
            <th>Product name</th>
            <th>Quantity in stock</th>
            <th>Price per item</th>
            <th>Datetime</th>
            <th>Total value number</th>

        </tr>
        </thead>
        <tbody data-bind="foreach: Product">
        <tr>
            <td data-bind="text: Product name"></td>
            <td data-bind="text:Quantity in stock "></td>
            <td data-bind="text: Price per item "></td>
            <td data-bind="text: Datetime "></td>
            <td data-bind="text: Total value number "></td>


        </tr>
        </tbody>
    </table>

</div>

<script>
    $(document).ready(function(){
        $('#submit').on('click',function(e){
            var st = '';
            e.preventDefault();
            var name1 = $("#id1").val();
            var name2 = $("#id2").val();
            var name3 = $("#id3").val();
            var ttv    = name2*name3;
            var a =0;


            $.ajax({
                type: "POST",
                url : "pro",
                data : {name1:name1,name2:name2,name3:name3},
                success : function(jsonData)
                {
                    $('#myTable tbody > tr').remove();
                    var obj = $.parseJSON(jsonData);
                    for (var i = 0; i < obj.length; i++) {
                        tr = $('<tr/>');
                        tr.append("<td>" + obj[i].name1 + "</td>");
                        tr.append("<td>" + obj[i].name2 + "</td>");
                        tr.append("<td>" + obj[i].name3 + "</td>");
                        tr.append("<td>" + new Date() + "</td>");
                        tr.append("<td>" + obj[i].name2*obj[i].name3 + "</td>");

                        $('table').append(tr);
                    }

                    $.each(obj,function(key)
                    {
                        a=a+(obj[key].name2*obj[key].name3)

                    });
                    tr = $('<tr/>');

                    tr.append("<td>" +"Total" + "</td>");
                    tr.append("<td>" +"" + "</td>");
                    tr.append("<td>" + "" + "</td>");
                    tr.append("<td>" + "" + "</td>");
                    tr.append("<td>" + a + "</td>")
                    $('table').append(tr);


                }
            },"json");


        });

    });
</script>
</body>

</html>


