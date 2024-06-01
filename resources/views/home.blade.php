@include('layout.header')
  <main>
    <article>


      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">10% off all products.</p>

            <h2 class="h1 hero-title">
              Qualityful <span class="span">organic</span>
              fruit & <span class="span">vegetables.</span>
            </h2>

            <p class="hero-text">
            Feel beautiful inside and out with natural products that come straight from nature.            </p>

            <a href="{{route('shopnow')}}" class="btn btn-primary">
              <span class="span">Shop Now</span>

              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">
            <img src="public/assets/images/hero-banner.png" width="603" height="634" loading="lazy" alt="Vegetables"
              class="w-100">
          </figure>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service">
        <div class="container">

          <ul class="service-list">

            <li class="service-item">
              <div class="item-icon">
                <img src="public/assets/images/service-icon-1.png" width="40" height="40" loading="lazy" alt="Truck icon">
              </div>

              <h3 class="h3 item-title">Free Shipping</h3>
            </li>

            <li class="service-item">
              <div class="item-icon">
                <img src="public/assets/images/service-icon-2.png" width="40" height="40" loading="lazy"
                  alt="Payment card icon">
              </div>

              <h3 class="h3 item-title">Safe Payment</h3>
            </li>

            <li class="service-item">
              <div class="item-icon">
                <img src="public/assets/images/service-icon-3.png" width="40" height="40" loading="lazy" alt="Helpline icon">
              </div>

              <h3 class="h3 item-title">24/7 Support</h3>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #OFFERS
      -->

      <section class="section offers">
        <div class="container">

          <ul class="offers-list has-scrollbar">

            <li class="offers-item">
              <a href="{{route('shopnow')}}" class="offers-card">

                <figure class="card-banner">
                  <img src="public/assets/images/offer-1.png" width="292" height="230" loading="lazy"
                    alt="Fresh vegetables package" class="w-100">
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Up To 10% Off</p>

                  <h3 class="h3 card-title">Fresh vegetables package.</h3>

                  <div class="btn btn-primary">Shop Now</div>
                </div>

              </a>
            </li>

            <li class="offers-item">
              <a href="{{route('shopnow')}}" class="offers-card">

                <figure class="card-banner">
                  <img src="public/assets/images/offer-2.png" width="336" height="244" loading="lazy"
                    alt="Healthy & fresh beef" class="w-100">
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Up To 10% Off</p>

                  <h3 class="h3 card-title">Healthy & fresh beef.</h3>

                  <div class="btn btn-primary">Shop Now</div>
                </div>

              </a>
            </li>

          </ul>

        </div>
      </section>




      <!-- 
        - #PRODUCT
      -->
      @include('cards')

           
      
      <section class="cta">
        <div class="container">

          <p class="section-subtitle">Summer Offer</p>

          <h2 class="h2 section-title">Up To 10% Off All Product.</h2><br>
<p >Feel beautiful inside and out with natural products that come straight from nature.</p><br>
        

          <a href="{{route('shopnow')}}" class="btn btn-primary">
            <span>Shop Now</span>

            <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>
          </a>

        </div>
      </section>





    
      <!-- 
        - #TOP PRODUCT
      -->

    

      @include('trendycards')



      <!-- 
        - #PARTNER
      -->

      <section class="section partner ">
        <div class="container ">

          <p class="section-subtitle"> -- Organic Food --</p>

          <h2 class="h2 section-title">Trusted Partners</h2>

          <ul class="has-scrollbar">

            <li class="partner-item">
              <figure class="partner-logo">
                <img src="public/assets/images/partner-1.png" width="132" height="134" loading="lazy" alt="Partner logo">
              </figure>
            </li>

            <li class="partner-item">
              <figure class="partner-logo">
                <img src="public/assets/images/partner-2.png" width="132" height="134" loading="lazy" alt="Partner logo">
              </figure>
            </li>

            <li class="partner-item">
              <figure class="partner-logo">
                <img src="public/assets/images/partner-3.png" width="132" height="134" loading="lazy" alt="Partner logo">
              </figure>
            </li>

            <li class="partner-item">
              <figure class="partner-logo">
                <img src="public/assets/images/partner-4.png" width="132" height="134" loading="lazy" alt="Partner logo">
              </figure>
            </li>

            <li class="partner-item">
              <figure class="partner-logo">
                <img src="public/assets/images/partner-5.png" width="132" height="134" loading="lazy" alt="Partner logo">
              </figure>
            </li>

            <li class="partner-item">
              <figure class="partner-logo">
                <img src="public/assets/images/partner-6.png" width="132" height="134" loading="lazy" alt="Partner logo">
              </figure>
            </li>

          </ul>

        </div>
      </section>


<br>


      <!-- 
        - #TESTIMONIALS
      -->




     

  @include('layout.blogH')



      <!-- 
        - #NEWSLETTER
      -->

      <section class="section newsletter ">
        <div class="container">

          <div class="newsletter-card">

            <p class="section-subtitle"> -- Subscribe Newsletter --</p>

            <h2 class="h2 section-title">Sign Up To Newsletter & Get <span class="span">20% Off.</span></h2>

            <form action="" class="newsletter-form">

              <input type="email" name="email" placeholder="Enter your email" required class="input-email">

              <button type="submit" class="btn btn-primary">
                <span>Sign Up</span>

                <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>
              </button>

            </form>

          </div>

        </div>
      </section>

    </article>
  </main>

@include('layout.footer')


