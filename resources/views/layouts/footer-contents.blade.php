<footer class="py-5 bg-dark"> 
	<div class="container"> 
		<div class="row"> 
			<div class="col-sm-6"> 
				<p class="text-white">
					{{ config('app.name') }} <br>
					26 Porter St. Boston,MA 02128 <br>
					Phone: (617)821-6721, (617)259-7671 <br>
				</p>
			</div>
			<div class="col-sm-6">
				<p>
					<span class="text-info">Sitemap </span> <br>
					<a class="text-white" href="/quote/">Get Quote</a> <br>
					<a class="text-white" href="/about/">About us</a> <br>
					<a class="text-white" href="/services">Services</a> <br>
					<a class="text-white" href="/contact">Contact</a> <br>
				</p>
			 </div>
		</div>
		<div class="">
            	 <h5 class="text-info">Secure Payment</h5>
             	   <a href="#"><i class="fab fa-cc-mastercard fa-3x"></i> </a>
                  <a href="#"> <i class="fab fa-cc-visa fa-3x"></i> </a>
                  <a href="#"><i class="fab fa-cc-discover fa-3x"></i> </a>
                  <a href="#"> <i class="fab fa-cc-amex fa-3x"></i> </a>
                  <a href="#"><i class="fab fa-cc-paypal fa-3x"></i> </a>
             </div>
		
			<p class="m-0 text-center text-white">
    			Copyright &copy; {{ config('app.name') }} {{ date('Y') }} <br>
    			Designed and Developed by <a href="http://monirkhan.net/"> Md khan(Monir Khan) </a>
    		</p>
	</div>
</footer>