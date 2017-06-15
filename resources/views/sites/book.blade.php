@extends('sites.layouts.master')

@section('body')
	<div class="map-wapper-opacity">
		<div class="container">
			<div class="row">
				@include('sites.includes.navigation')
			</div>	
		</div>
	</div>
	<div class="divide" style="height: 100px;"></div>
	
	<div class="container">
			<div class="row">
				<div class="page29-wrap">				
					<div class="col-sm-6">
						<div class="row booking">
							<div class="short-banner">
								<div class="short-banner-img"><img class="img-responsive" src="images/short-banner.jpg" alt=""/></div> 
								<div class="short-banner-text"><a href="#"><h4>I’m In The City <br/> For A Few Days & I Need A Car</h4></a></div> 
							</div>
							<h3>Your Transfer Details</h3>
							<h5>Give complete transfer details</h5>
							<form class="form-horizontal">
								<div class="form-group"> 
									<div class=" col-sm-12 third-form-wrap">
										<input type="text" class="form-control" id="inputname2" placeholder="First Name*" required> 
									</div>
								</div>
								<div class="form-group"> 
									<div class=" col-sm-12 third-form-wrap"> 
										<input type="text" class="form-control" id="inputlastname2" placeholder="Last Name" >
									</div>
								</div>
								<div class="form-group"> 
									<div class=" col-sm-12 third-form-wrap"> 
										<input type="Email" class="form-control" id="inputemail2" placeholder="Email Address*" required>
									</div>
								</div> 
								<div class="form-group"> 
									<div class=" col-sm-12 third-form-wrap"> 
										<input type="text" class="form-control" id="inputnumber2" placeholder="Mobile Number*" required>
									</div>
								</div> 
								<div class="form-group"> 
									<div class=" col-sm-12 third-form-wrap"> 
										<input type="text" class="form-control" id="inputage2" placeholder="Age">
									</div>
								</div> 
								<div class="form-group"> 
									<div class=" col-sm-12 third-form-wrap"> 
										<input type="text" class="form-control" id="inputcountry2" placeholder="Country*" required>
									</div>
								</div>
								<div class="form-group"> 
									<div class=" col-sm-12 third-form-wrap"> 
										<textarea class="form-control" rows="3"></textarea>
									</div>
								</div>
								<div class="form-group">
								  <div class="col-sm-offset-4 col-sm-8">
									<div class="completing-form-btnwrap completing-form-btnwrap2"><button type="submit" class="btn form-btn  btn-block">Complete Booking</button></div>
								  </div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="contact-details-wrap">
								<div class="contact-details-wrap-top">
									<div class="contact-details-car-wrap"><a href="#"><img class="minicar4" src="images/minicar.png" alt=""/></a></div> 
									<h4>Mini Car</h4>
								</div>
								<div class="contact-details-wrap-middle">
									<div class="col-sm-offset-2 col-sm-2">
										<div class="item-details-man5 item-details-man3 "><a href="#" class="img-circle"><img src="images/profile.png" alt=""></a></div>
									</div>
									<div class="col-sm-1">
										<div class="clipart5 clipart3 "><a href="#" class="">6</a></div> 
									</div> 
									<div class="col-sm-offset-1 col-sm-2">
										<div class=" item-details-man55 item-details-man3"><a href="#" class="img-circle"><img src="images/bag2.png" alt=""></a></div>
									</div>
									<div class="col-sm-1">
										<div class="clipart55 clipart3 "><a href="#" class="">6</a></div> 
									</div> 
								</div>
								
								<div class="contact-details-wrap-bottom Car-Type-wrap-margin"> 
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Car Type:</span></div>
											<div class="Private-Car"><span>Private Car</span></div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>From:</span></div>
											<div class="Private-Car"><span>Outstation</span></div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Service:</span></div>
											<div class="Private-Car"><span>London</span></div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Destination: </span></div>
											<div class="Private-Car"><span> Sunday, 09th December 2014</span></div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Pickup Date:</span></div>
											<div class="Private-Car"><span>Thursday, 20th December 2014</span></div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Drop Date:</span></div>
											<div class="Private-Car"><span>Not Set</span></div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Pickup Time:</span></div>
											<div class="Private-Car"><span>Not Set</span></div>
										</div>
									</div> <br/>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Fare Details:</span></div>
											<div class="Private-Car">
												<span>3000 Kms</span> <br/>
												<span>Per Km charge = $ 5.00</span> <br/>
												<span>No. of days = 12 day(s)</span> <br/>
												<span>Chauffeur charge = $.20 X 12</span> <br/>
												<span>Minimum billable kms per day = 250 kms</span> <br/>
												<span>Service Tax</span> 
												 
											</div>
										</div>
									</div> 
									
									<div class="row">
										<div class="col-sm-12">
											<div class="Car-Type"><span>Extra Charges:</span></div>
											<div class="Private-Car">
												<span>Tolls, parking and state permits as per actuals</span> <br/> 
												<span>Extra Km beyond 3000 kms = $.10.0/km</span> 
											</div>
										</div>
									</div> 
									
								</div>
								
								<div class="contact-details-wrap-footer">
									<span>Roundtrip Fare:</span>
									<h2>$128.99</h2>
									<p>(Inclusive of All Taxes)</p>
								</div>
							</div>
						</div>
					</div>				
				</div>  
			</div>
		</div>
@endsection