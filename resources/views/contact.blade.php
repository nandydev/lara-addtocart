@extends('shop')

@section('content')
<section class="bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Contact Us</h2>
              <p class="text-center mb-4">If you have any questions or need further information, please feel free to contact us using the form below.</p>
  
              <form action="{{ route('contact.send') }}" method="POST">
                  @csrf
                  <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="name" class="form-control form-control-lg" name="name" required>
                      <label class="form-label" for="name">Name</label>
                  </div>
  
                  <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email" id="email" class="form-control form-control-lg" name="email" required>
                      <label class="form-label" for="email">Email</label>
                  </div>
  
                  <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="subject" class="form-control form-control-lg" name="subject" required>
                      <label class="form-label" for="subject">Subject</label>
                  </div>
  
                  <div data-mdb-input-init class="form-outline mb-4">
                      <textarea id="message" class="form-control form-control-lg" name="message" rows="5" required></textarea>
                      <label class="form-label" for="message">Message</label>
                  </div>
  
                  <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4">Send Message</button>
                  </div>
              </form>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
