@extends('shop')

@section('content')
<section class="bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">About Us</h2>
                            <p class="mb-4 text-center">Welcome to SimpleCart, your one-stop destination for all your shopping needs. We pride ourselves on offering a diverse range of high-quality products at competitive prices.</p>
                            
                            <h3 class="text-uppercase text-center mb-3">Our Mission</h3>
                            <p class="mb-4 text-center">Our mission is to provide our customers with an exceptional shopping experience by offering a wide selection of products, outstanding customer service, and convenient online shopping.</p>
                            
                            <h3 class="text-uppercase text-center mb-3">Our Story</h3>
                            <p class="mb-4 text-center">Founded in [Year], SimpleCart started as a small local store and has since grown into a renowned online marketplace. Our commitment to quality and customer satisfaction has been the cornerstone of our success.</p>
                            
                            <h3 class="text-uppercase text-center mb-3">Meet Our Team</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img src="{{ asset('images/team1.jpg') }}" class="card-img-top" alt="Team Member 1" style="border-radius: 15px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">John Doe</h5>
                                            <p class="card-text">Founder & CEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img src="{{ asset('images/team2.jpg') }}" class="card-img-top" alt="Team Member 2" style="border-radius: 15px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Jane Smith</h5>
                                            <p class="card-text">Chief Operating Officer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img src="{{ asset('images/team3.jpg') }}" class="card-img-top" alt="Team Member 3" style="border-radius: 15px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Emily Johnson</h5>
                                            <p class="card-text">Head of Marketing</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="text-uppercase text-center mb-3">Contact Us</h3>
                            <p class="mb-4 text-center">If you have any questions, feel free to reach out to us:</p>
                            <ul class="list-unstyled text-center mb-5">
                                <li>Email: <a href="mailto:support@simplecart.com" class="text-body"><u>support@simplecart.com</u></a></li>
                                <li>Phone: <a href="tel:+1234567890" class="text-body"><u>(123) 456-7890</u></a></li>
                                <li>Address: 1234 Market Street, Anytown, USA</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
