@extends('sites.layouts.master')

@section('body')
        <div class="map-wapper-opacity">
            <div class="container">
                <div class="row">
                    @include('sites.includes.navigation')
                </div>
            </div>
        </div>
        <div class="google-image">
            <div id="directions-panel"></div>
            <div id="map-canvas"></div>
        </div>
        
        
        <!-- Booking now form wrapper html start --> 
        <div class="booking-form-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="form-wrap ">
                                <div class="form-headr"></div>
                                <h2>Fill in the Details Below to Book Your Transfer.</h2>
                                <div class="form-select">
                                    <form>
                                        <div class="col-sm-12 custom-select-box tec-domain-cat1">
                                            <div class="row">
                                                <select class="selectpicker" data-live-search="false" >
                                                    <option>city</option>
                                                    <option>khulna</option>
                                                    <option>dhaka</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 custom-select-box tec-domain-cat2">
                                            <div class="row">
                                                <select class="selectpicker" data-live-search="false"  >
                                                    <option>transfer type</option>
                                                    <option>transfer type 1</option>
                                                    <option>transfer type 2</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 custom-select-box tec-domain-cat3">
                                            <div class="row"> 
                                                <div id="panel"> 
                                                <select id="start" onchange="calcRoute();" class="selectpicker custom-select-box tec-domain-cat">
                                                  <option value="">puck-up location</option>
                                                  <option value="chicago, il">Chicago</option>
                                                  <option value="st louis, mo">St Louis</option>
                                                  <option value="joplin, mo">Joplin, MO</option>
                                                  <option value="oklahoma city, ok">Oklahoma City</option>
                                                  <option value="amarillo, tx">Amarillo</option>
                                                  <option value="gallup, nm">Gallup, NM</option>
                                                  <option value="flagstaff, az">Flagstaff, AZ</option>
                                                  <option value="winona, az">Winona</option>
                                                  <option value="kingman, az">Kingman</option>
                                                  <option value="barstow, ca">Barstow</option>
                                                  <option value="san bernardino, ca">San Bernardino</option>
                                                  <option value="los angeles, ca">Los Angeles</option>
                                                  <option value="khulna">Khulna, Bangladesh</option>
                                                  <option value="terokhada">Terokhada, Bangladesh</option>
                                                </select>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                        <div class="col-sm-12 custom-select-box tec-domain-cat4">
                                            <div class="row">
                                                <div> 
                                                    <select id="end" onchange="calcRoute();"  class="selectpicker custom-select-box tec-domain-cat">
                                                        <option value="">drop-off location</option>
                                                      <option value="chicago, il">Chicago</option>
                                                      <option value="st louis, mo">St Louis</option>
                                                      <option value="joplin, mo">Joplin, MO</option>
                                                      <option value="oklahoma city, ok">Oklahoma City</option>
                                                      <option value="amarillo, tx">Amarillo</option>
                                                      <option value="gallup, nm">Gallup, NM</option>
                                                      <option value="flagstaff, az">Flagstaff, AZ</option>
                                                      <option value="winona, az">Winona</option>
                                                      <option value="kingman, az">Kingman</option>
                                                      <option value="barstow, ca">Barstow</option>
                                                      <option value="san bernardino, ca">San Bernardino</option>
                                                      <option value="los angeles, ca">Los Angeles</option>
                                                      <option value="Satkhira">Satkhira, Bangladesh</option>
                                                      <option value="terokhada">Terokhada, Bangladesh</option>
                                                    </select>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-8 custom-select-box tec-domain-cat5 day">
                                                    <div class="row" > 
                                                        <input class="form-control custom-select-box tec-domain-cat5" type="date" name="date"  />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-4 custom-select-box tec-domain-cat6 time">
                                                    <div class="row">
                                                        <select class="selectpicker" data-live-search="false" >
                                                            <option class="time1"> 08:00</option>
                                                            <option class="time1"> 09:00</option>
                                                            <option class="time1"> 10:00</option>
                                                         </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                 
                                        <div class="form-button">
                                            <button type="submit" class="btn form-btn btn-lg btn-block">Search For Taxi Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!-- Booking now form wrapper html Exit -->     
    
        <!-- label white html start -->
        <div class="label-white white-lable-m">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6" data-uk-scrollspy="{cls:'uk-animation-fade', delay:300, repeat: true}">
                        <div class="row"> 
                            <div class="label-item">
                                <div class="containt-font"> 
                                    <a href="#" class="img-circle"><img src="images/lock.png" alt=""/></a>  
                                </div>
                                <div class="containt-text">
                                    <h3>Secure Booking</h3>
                                    <span>We ensure safest booking!</span>
                                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio cidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.</p>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-uk-scrollspy="{cls:'uk-animation-fade', delay:300, repeat: true}">
                        <div class="row"> 
                            <div class="label-item">
                                <div class="containt-font">
                                    <a href="#" class="img-circle"><img src="images/reliable.png" alt=""/></a>  
                                </div>
                                <div class="containt-text">
                                    <h3>Reliable Service</h3>
                                    <span>We ensure safest booking!</span>
                                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio cidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.</p>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" data-uk-scrollspy="{cls:'uk-animation-fade', delay:300, repeat: true}">
                        <div class="row"> 
                            <div class="label-item">
                                <div class="containt-font">
                                    <a href="#" class="img-circle"><img src="images/customer.png" alt=""/></a>  
                                </div>
                                <div class="containt-text">
                                    <h3>Customer Service</h3>
                                    <span>We ensure safest booking!</span>
                                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio cidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.</p>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 " data-uk-scrollspy="{cls:'uk-animation-fade', delay:300, repeat: true}">
                        <div class="row float-right"> 
                            <div class="label-item ">
                                <div class="containt-font" >
                                    <a href="#" class="img-circle"><img src="images/hidden.png" alt=""/></a>  
                                </div>
                                <div class="containt-text">
                                    <h3>No Hidden Charges</h3>
                                    <span>We ensure safest booking!</span>
                                    <p>Morbi accumsan ipsum velit. Nam nec tellus a odio cidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.</p>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- label white html exit -->
@endsection