<footer class="site-footer border-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="row">
          <div class="col-md-12">
            <h3 class="footer-heading mb-4">{{__('footer.navigations')}}</h3>
          </div>

          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="#">{{__('footer.sell_online')}}</a></li>
              <li><a href="#">{{__('footer.features')}}</a></li>
              <li><a href="#">{{__('footer.shopping_cart')}}</a></li>
              <li><a href="#">{{__('footer.store_builder')}}</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="#">{{__('footer.mobile_commerce')}}</a></li>
              <li><a href="#">{{__('footer.dropshipping')}}</a></li>
              <li><a href="#">{{__('footer.website_development')}}</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-4">
            <ul class="list-unstyled">
              <li><a href="#">{{ __('footer.point_of_sale') }}</a></li>
              <li><a href="#">{{ __('footer.hardware') }}</a></li>
              <li><a href="#">{{ __('footer.software') }}</a></li>
            </ul>
          </div>
        </div>

        <div class="block-7 mt-5">
          <form action="#" method="post">
            <label for="email_subscribe" class="footer-heading">{{ __('footer.subscribe') }}</label>
            <div class="form-group">
              <input type="text" class="form-control py-4" id="email_subscribe"
                placeholder="{{ __('footer.email_placeholder') }}">
              <input type="submit" class="btn btn-sm btn-primary" value="{{ __('footer.send') }}">
            </div>
          </form>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
        <h3 class="footer-heading mb-4">{{ __('footer.promo') }}</h3>
        <a href="#" class="block-6">
          <img src="{{asset('assets/images/hero_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
          <h3 class="font-weight-light  mb-0">{{ __('footer.finding_perfect_shoes') }}</h3>
          <p>{{ __('footer.promo_date') }}</p>
        </a>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="block-5 mb-5">
          <h3 class="footer-heading mb-4">{{ __('footer.contact_info') }}</h3>
          <ul class="list-unstyled">
            <li class="address"><a href="#">{{ __('footer.address') }}</a></li>
            <li class="phone"><a href="tel://+201092321755">{{ __('footer.phone') }}</a></li>
            <li class="email"><a href="mailto:mohamedragab0160@gmail.com">{{ __('footer.email') }}</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row mt-5 text-center">
      <div class="col-md-12">
        {{ __('footer.copyright') }} &copy;
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script>document.write(new Date().getFullYear());</script> {{ __('footer.all_rights_reserved') }} <i
          class="icon-heart" aria-hidden="true"></i> {{ __('footer.by') }} <a
          href="https://portfolio-three-mu-c4nltkm0u6.vercel.app/" target="_blank"
          class="text-primary">{{ __("home.Shoppers") }}</a>
      </div>

    </div>
  </div>
</footer>