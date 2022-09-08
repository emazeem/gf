src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initAutocomplete&libraries=places&v=weekly"
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHnU37fb7vYUBQVFAQ3_bFSX7KqNNlpUY&libraries=places"></script>
<h1>places autocomplete testing</h1>
<input type="text" id="location" name="location" placeholder="City or ZIP code">
<input type="submit" value="GO" id="go">
<span class="zip"></span>

<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
    body {margin:10%;font-family:'Montserrat',sans-serif;background:#eee;color:#666;}
    h1 {font-size:1.3em;text-transform:uppercase;}
    input {padding:6px;border:3px solid #999;background:none;font-family:'Montserrat',sans-serif;color:#666;font-size:16px;width:260px;}
    input:focus {border-color:#00aeff;outline:0;background:#f9f9f9;}
    input[type=submit] {width:80px;background:#00aeff;border-color:#00aeff;color:#eee;cursor:pointer;}
    span.zip {margin:1em 0;display:block;text-transform:uppercase;font-size:0.9em;color:#999;} span.zip:before {content:'ZIP code: '}
</style>
<script>
    $(function(){

        var autocomplete;
        var geocoder;
        var input = document.getElementById('location');
        var options = {
            componentRestrictions: {'country':'no'},
            types: ['(regions)'] // (cities)
        };

        autocomplete = new google.maps.places.Autocomplete(input,options);

        $('#go').click(function(){
            var location = autocomplete.getPlace();
            geocoder = new google.maps.Geocoder();
            console.log(location['geometry'])
            lat = location['geometry']['location'].lat();
            lng = location['geometry']['location'].lng();
            var latlng = new google.maps.LatLng(lat,lng);

            // http://stackoverflow.com/a/5341468
            geocoder.geocode({'latLng': latlng}, function(results) {
                for(i=0; i < results.length; i++){
                    for(var j=0;j < results[i].address_components.length; j++){
                        for(var k=0; k < results[i].address_components[j].types.length; k++){
                            if(results[i].address_components[j].types[k] == "postal_code"){
                                zipcode = results[i].address_components[j].short_name;
                                $('span.zip').html(zipcode);
                            }
                        }
                    }
                }
            });

        });


    });
</script>