<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<body>

    <form  method="GET">
        <label for="string">Enter the product name</label>
        <input type="text" name="string" id="string" onkeyup="loadsuggestion()">
        <div id="result">

        </div>

    </form>

    <script>


        function loadsuggestion()
        {
            var address='searchquery.php?value='+document.getElementById('string').value;
            var xhr= new XMLHttpRequest();
            xhr.open('GET',address,true);

            xhr.onload=function()
            {
                if(this.status==200)
                {
                    var resultvar=JSON.parse(this.responseText);
                    var resultstring='';
                    var i=0;
                    while(resultvar[i])
                    {
                        resultstring+="<a href='location.php?name="+resultvar[i]+"'>"+resultvar[i]+'</a><br>';
                        i+=1;
                    }
                    document.getElementById('result').innerHTML=resultstring;
                }
            }
            xhr.send();
        }


    </script>
</body>
</html>
