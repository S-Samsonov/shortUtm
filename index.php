<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">

    <h1>
        <?= 'Сокращение cсылок <span class="badge badge-warning">alpha 0.1</span>' ?>   
    </h1>


    <div class="input-group mb-3">
        <div class="input-group-prepend"><span class="input-group-text">Ссылка</span></div>
        <input type="text" class="form-control" placeholder="Ссылка" name="link">
    </div>

    <div class="input-group mb-3">
        <select class="custom-select" id="inputGroupSelect04">
          <option selected value="vk">Вконтакте</option>
          <!-- <option value="od">Однокласники</option> -->
        </select>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="generate">Сгенерировать</button>
        </div>
    </div>

    <div class="input-group input-group-sm mb-3 form-group">
        <div class="input-group-prepend"><span class="input-group-text">UTM_SOURCE</span></div>
        <input type="text" class="form-control" placeholder="UTM_SOURCE" name="utm_source">
    </div>

    <div class="input-group input-group-sm mb-3 form-group">
        <div class="input-group-prepend"><span class="input-group-text">UTM_MEDIUM</span></div>
        <input type="text" class="form-control" placeholder="UTM_MEDIUM" name="utm_medium">
    </div>

    <div class="input-group input-group-sm mb-3 form-group">
        <div class="input-group-prepend"><span class="input-group-text">UTM_CAMPAIGN</span></div>
        <input type="text" class="form-control" placeholder="UTM_CAMPAIGN" name="utm_campaign">
    </div>

    <div class="input-group input-group-sm mb-3 form-group">
        <div class="input-group-prepend"><span class="input-group-text">UTM_CONTENT</span></div>
        <input type="text" class="form-control" placeholder="UTM_CONTENT" name="utm_content">
    </div>

    <div class="input-group input-group-sm mb-3 form-group">
        <div class="input-group-prepend"><span class="input-group-text">UTM_TERM</span></div>
        <input type="text" class="form-control" placeholder="UTM_TERM" name="utm_term">
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>

    $('#generate').click(function(){
        let link = $('input[name="link"]').val();
        let getParam = '';
        let param = {
            utm_source: $('input[name="utm_source"]').val(),
            utm_medium: $('input[name="utm_medium"]').val(),
            utm_campaign: $('input[name="utm_campaign"]').val(),
            utm_content: $('input[name="utm_content"]').val(),
            utm_term: $('input[name="utm_term"]').val(),
        }

        for (var prop in param) {
            getParam += `&${prop}=${param[prop]}`;
        }

        link += (link.indexOf('?') !== -1) ? getParam : '?' + getParam.slice(1);

        let url = `https://api.vk.com/method/utils.getShortLink?url=${encodeURIComponent(link)}&access_token=204d6377204d6377204d637713203efbbf2204d204d63777f0fe3ec2af2ca363289a1e3&v=5.21`;

        
        $.ajax({
            type: 'GET',
            url: url,
            crossDomain: true,
            // data: '{"some":"json"}',
            dataType: 'json',
            success: function(responseData, textStatus, jqXHR) {
                console.log(responseData, textStatus, jqXHR);
                // var value = responseData.someKey;
            },
            error: function (responseData, textStatus, errorThrown) {
                alert('POST failed.');
            }
        });
      
        // fetch(url,{mode: 'cors'})
        //     .then((response) => {
        //         return response.json();
        //     })
        //     .then((data) => {
        //         console.log(data);
        //     });
    });
    
</script>
</body>
</html>