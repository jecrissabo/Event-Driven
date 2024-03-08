<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/search.js"></script>
</head>
<body>
    <strong>Search : </strong>
    <input onkeyup="search(this.value)"  type="text" placeholder="search data here...">
    <hr>
    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th width="150">Zip code</th>
                <th style="text-align: left; padding-left: 10px">Municipality Name</th>
            </tr>
        </thead>
        <tbody id="results">

        </tbody>
    </table>

</body>
</html>