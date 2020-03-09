@extends('template/frontend/themes/mazaar/layouts/default')
@section('content')
    @include('template/frontend/themes/mazaar/includes/newsletter-popup/newsletter-popup')
    @include('template/frontend/themes/mazaar/includes/sidebar-cart/sidebar-cart')
        @include('template/frontend/themes/mazaar/includes/sidebar-wishlist/sidebar-wishlist')

    <!-- Site Wraper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .place-order {
          padding: 25px;
        }
    </style>
    <div class="site-wraper">
      @include('template/frontend/themes/mazaar/includes/topbar/topbar')
      @include('template/frontend/themes/mazaar/includes/header/header', ['data' => $data])

        <!--Page Body Content -->
        <div class="page-contaiter">
            @include('template/frontend/themes/mazaar/modules/hero-banner-with-breadcrumb',['data' => $data])
            <!--Content-->

            <section class="sec-padding--md">
              <div class="container">
                  <!--Alert-->
                  <div class="alert-info" role="alert">
                      <!--<a class="button" href="#">View Cart</a>-->
                      Returning customer? <a href="#">Click here to login</a>
                  </div>
                  <!--Alert-->
                  <!--Alert-->
                  <div class="alert-info" role="alert">
                      <!--<a class="button" href="#">View Cart</a>-->
                      Have a coupon? <a href="#">Click here to enter your code</a>
                  </div>
                  @if ($errors->any())
                  <div class="alert-info" role="alert">

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                  </div>
                  @endif
                  @if (Session::has('msg'))
                    <div class="alert alert-success alert-dismissible" role="alert" >
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Success! <strong>"{{ Session::get('msg') }}"</strong>
                    </div>
                  @endif
                  <!--Alert-->

                  <form role="form"  method="post"  class="row product-checkout require-validation"
                                                   data-cc-on-file="false"
                                                  data-stripe-publishable-key="pk_test_DBsMDiC5RxzPikU4qEb1GsZW00EddMD0u4"
                                                  id="payment-form">
                      <div class="col-md-6 pr-md-5">
                          <div class="product-checkout-customer_details billing_details">
                              <h3>Billing Details</h3>
                              <div class="row billing-fields__field-wrapper">
                                  <p class="form-field-wrapper col-sm-6">
                                      <label for="billing_first_name">First Name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="billing_first_name" id="billing_first_name" title="First Name" value="{{old('billing_first_name')}}" placeholder="First Name" required="" aria-required="true" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-6">
                                      <label for="billing_last_name" class="">Last Name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="billing_last_name" id="billing_last_name" placeholder="" value="{{old('billing_last_name')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_company" class="">Company Name &nbsp;<span class="optional">(optional)</span></label>
                                      <input class="form-full input--lg" name="billing_company" id="billing_company" placeholder="" value="{{old('billing_company')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_country" class="">Country &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <select name="billing_country" id="billing_country" class="form-full input--lg" autocomplete="country" tabindex="-1" aria-hidden="true">
                                          <option value="">Select a country…</option>
                                          <option value="AX">Åland Islands</option>
                                          <option value="AF">Afghanistan</option>
                                          <option value="AL">Albania</option>
                                          <option value="DZ">Algeria</option>
                                          <option value="AS">American Samoa</option>
                                          <option value="AD">Andorra</option>
                                          <option value="AO">Angola</option>
                                          <option value="AI">Anguilla</option>
                                          <option value="AQ">Antarctica</option>
                                          <option value="AG">Antigua and Barbuda</option>
                                          <option value="AR">Argentina</option>
                                          <option value="AM">Armenia</option>
                                          <option value="AW">Aruba</option>
                                          <option value="AU">Australia</option>
                                          <option value="AT">Austria</option>
                                          <option value="AZ">Azerbaijan</option>
                                          <option value="BS">Bahamas</option>
                                          <option value="BH">Bahrain</option>
                                          <option value="BD">Bangladesh</option>
                                          <option value="BB">Barbados</option>
                                          <option value="BY">Belarus</option>
                                          <option value="PW">Belau</option>
                                          <option value="BE">Belgium</option>
                                          <option value="BZ">Belize</option>
                                          <option value="BJ">Benin</option>
                                          <option value="BM">Bermuda</option>
                                          <option value="BT">Bhutan</option>
                                          <option value="BO">Bolivia</option>
                                          <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                          <option value="BA">Bosnia and Herzegovina</option>
                                          <option value="BW">Botswana</option>
                                          <option value="BV">Bouvet Island</option>
                                          <option value="BR">Brazil</option>
                                          <option value="IO">British Indian Ocean Territory</option>
                                          <option value="VG">British Virgin Islands</option>
                                          <option value="BN">Brunei</option>
                                          <option value="BG">Bulgaria</option>
                                          <option value="BF">Burkina Faso</option>
                                          <option value="BI">Burundi</option>
                                          <option value="KH">Cambodia</option>
                                          <option value="CM">Cameroon</option>
                                          <option value="CA">Canada</option>
                                          <option value="CV">Cape Verde</option>
                                          <option value="KY">Cayman Islands</option>
                                          <option value="CF">Central African Republic</option>
                                          <option value="TD">Chad</option>
                                          <option value="CL">Chile</option>
                                          <option value="CN">China</option>
                                          <option value="CX">Christmas Island</option>
                                          <option value="CC">Cocos (Keeling) Islands</option>
                                          <option value="CO">Colombia</option>
                                          <option value="KM">Comoros</option>
                                          <option value="CG">Congo (Brazzaville)</option>
                                          <option value="CD">Congo (Kinshasa)</option>
                                          <option value="CK">Cook Islands</option>
                                          <option value="CR">Costa Rica</option>
                                          <option value="HR">Croatia</option>
                                          <option value="CU">Cuba</option>
                                          <option value="CW">Curaçao</option>
                                          <option value="CY">Cyprus</option>
                                          <option value="CZ">Czech Republic</option>
                                          <option value="DK">Denmark</option>
                                          <option value="DJ">Djibouti</option>
                                          <option value="DM">Dominica</option>
                                          <option value="DO">Dominican Republic</option>
                                          <option value="EC">Ecuador</option>
                                          <option value="EG">Egypt</option>
                                          <option value="SV">El Salvador</option>
                                          <option value="GQ">Equatorial Guinea</option>
                                          <option value="ER">Eritrea</option>
                                          <option value="EE">Estonia</option>
                                          <option value="ET">Ethiopia</option>
                                          <option value="FK">Falkland Islands</option>
                                          <option value="FO">Faroe Islands</option>
                                          <option value="FJ">Fiji</option>
                                          <option value="FI">Finland</option>
                                          <option value="FR">France</option>
                                          <option value="GF">French Guiana</option>
                                          <option value="PF">French Polynesia</option>
                                          <option value="TF">French Southern Territories</option>
                                          <option value="GA">Gabon</option>
                                          <option value="GM">Gambia</option>
                                          <option value="GE">Georgia</option>
                                          <option value="DE">Germany</option>
                                          <option value="GH">Ghana</option>
                                          <option value="GI">Gibraltar</option>
                                          <option value="GR">Greece</option>
                                          <option value="GL">Greenland</option>
                                          <option value="GD">Grenada</option>
                                          <option value="GP">Guadeloupe</option>
                                          <option value="GU">Guam</option>
                                          <option value="GT">Guatemala</option>
                                          <option value="GG">Guernsey</option>
                                          <option value="GN">Guinea</option>
                                          <option value="GW">Guinea-Bissau</option>
                                          <option value="GY">Guyana</option>
                                          <option value="HT">Haiti</option>
                                          <option value="HM">Heard Island and McDonald Islands</option>
                                          <option value="HN">Honduras</option>
                                          <option value="HK">Hong Kong</option>
                                          <option value="HU">Hungary</option>
                                          <option value="IS">Iceland</option>
                                          <option value="IN">India</option>
                                          <option value="ID">Indonesia</option>
                                          <option value="IR">Iran</option>
                                          <option value="IQ">Iraq</option>
                                          <option value="IE">Ireland</option>
                                          <option value="IM">Isle of Man</option>
                                          <option value="IL">Israel</option>
                                          <option value="IT">Italy</option>
                                          <option value="CI">Ivory Coast</option>
                                          <option value="JM">Jamaica</option>
                                          <option value="JP">Japan</option>
                                          <option value="JE">Jersey</option>
                                          <option value="JO">Jordan</option>
                                          <option value="KZ">Kazakhstan</option>
                                          <option value="KE">Kenya</option>
                                          <option value="KI">Kiribati</option>
                                          <option value="KW">Kuwait</option>
                                          <option value="KG">Kyrgyzstan</option>
                                          <option value="LA">Laos</option>
                                          <option value="LV">Latvia</option>
                                          <option value="LB">Lebanon</option>
                                          <option value="LS">Lesotho</option>
                                          <option value="LR">Liberia</option>
                                          <option value="LY">Libya</option>
                                          <option value="LI">Liechtenstein</option>
                                          <option value="LT">Lithuania</option>
                                          <option value="LU">Luxembourg</option>
                                          <option value="MO">Macao S.A.R., China</option>
                                          <option value="MK">Macedonia</option>
                                          <option value="MG">Madagascar</option>
                                          <option value="MW">Malawi</option>
                                          <option value="MY">Malaysia</option>
                                          <option value="MV">Maldives</option>
                                          <option value="ML">Mali</option>
                                          <option value="MT">Malta</option>
                                          <option value="MH">Marshall Islands</option>
                                          <option value="MQ">Martinique</option>
                                          <option value="MR">Mauritania</option>
                                          <option value="MU">Mauritius</option>
                                          <option value="YT">Mayotte</option>
                                          <option value="MX">Mexico</option>
                                          <option value="FM">Micronesia</option>
                                          <option value="MD">Moldova</option>
                                          <option value="MC">Monaco</option>
                                          <option value="MN">Mongolia</option>
                                          <option value="ME">Montenegro</option>
                                          <option value="MS">Montserrat</option>
                                          <option value="MA">Morocco</option>
                                          <option value="MZ">Mozambique</option>
                                          <option value="MM">Myanmar</option>
                                          <option value="NA">Namibia</option>
                                          <option value="NR">Nauru</option>
                                          <option value="NP">Nepal</option>
                                          <option value="NL">Netherlands</option>
                                          <option value="NC">New Caledonia</option>
                                          <option value="NZ">New Zealand</option>
                                          <option value="NI">Nicaragua</option>
                                          <option value="NE">Niger</option>
                                          <option value="NG">Nigeria</option>
                                          <option value="NU">Niue</option>
                                          <option value="NF">Norfolk Island</option>
                                          <option value="KP">North Korea</option>
                                          <option value="MP">Northern Mariana Islands</option>
                                          <option value="NO">Norway</option>
                                          <option value="OM">Oman</option>
                                          <option value="PK">Pakistan</option>
                                          <option value="PS">Palestinian Territory</option>
                                          <option value="PA">Panama</option>
                                          <option value="PG">Papua New Guinea</option>
                                          <option value="PY">Paraguay</option>
                                          <option value="PE">Peru</option>
                                          <option value="PH">Philippines</option>
                                          <option value="PN">Pitcairn</option>
                                          <option value="PL">Poland</option>
                                          <option value="PT">Portugal</option>
                                          <option value="PR">Puerto Rico</option>
                                          <option value="QA">Qatar</option>
                                          <option value="RE">Reunion</option>
                                          <option value="RO">Romania</option>
                                          <option value="RU">Russia</option>
                                          <option value="RW">Rwanda</option>
                                          <option value="ST">São Tomé and Príncipe</option>
                                          <option value="BL">Saint Barthélemy</option>
                                          <option value="SH">Saint Helena</option>
                                          <option value="KN">Saint Kitts and Nevis</option>
                                          <option value="LC">Saint Lucia</option>
                                          <option value="SX">Saint Martin (Dutch part)</option>
                                          <option value="MF">Saint Martin (French part)</option>
                                          <option value="PM">Saint Pierre and Miquelon</option>
                                          <option value="VC">Saint Vincent and the Grenadines</option>
                                          <option value="WS">Samoa</option>
                                          <option value="SM">San Marino</option>
                                          <option value="SA">Saudi Arabia</option>
                                          <option value="SN">Senegal</option>
                                          <option value="RS">Serbia</option>
                                          <option value="SC">Seychelles</option>
                                          <option value="SL">Sierra Leone</option>
                                          <option value="SG">Singapore</option>
                                          <option value="SK">Slovakia</option>
                                          <option value="SI">Slovenia</option>
                                          <option value="SB">Solomon Islands</option>
                                          <option value="SO">Somalia</option>
                                          <option value="ZA">South Africa</option>
                                          <option value="GS">South Georgia/Sandwich Islands</option>
                                          <option value="KR">South Korea</option>
                                          <option value="SS">South Sudan</option>
                                          <option value="ES">Spain</option>
                                          <option value="LK">Sri Lanka</option>
                                          <option value="SD">Sudan</option>
                                          <option value="SR">Suriname</option>
                                          <option value="SJ">Svalbard and Jan Mayen</option>
                                          <option value="SZ">Swaziland</option>
                                          <option value="SE">Sweden</option>
                                          <option value="CH">Switzerland</option>
                                          <option value="SY">Syria</option>
                                          <option value="TW">Taiwan</option>
                                          <option value="TJ">Tajikistan</option>
                                          <option value="TZ">Tanzania</option>
                                          <option value="TH">Thailand</option>
                                          <option value="TL">Timor-Leste</option>
                                          <option value="TG">Togo</option>
                                          <option value="TK">Tokelau</option>
                                          <option value="TO">Tonga</option>
                                          <option value="TT">Trinidad and Tobago</option>
                                          <option value="TN">Tunisia</option>
                                          <option value="TR">Turkey</option>
                                          <option value="TM">Turkmenistan</option>
                                          <option value="TC">Turks and Caicos Islands</option>
                                          <option value="TV">Tuvalu</option>
                                          <option value="UG">Uganda</option>
                                          <option value="UA">Ukraine</option>
                                          <option value="AE">United Arab Emirates</option>
                                          <option value="GB">United Kingdom (UK)</option>
                                          <option value="US" selected="selected">United States (US)</option>
                                          <option value="UM">United States (US) Minor Outlying Islands</option>
                                          <option value="VI">United States (US) Virgin Islands</option>
                                          <option value="UY">Uruguay</option>
                                          <option value="UZ">Uzbekistan</option>
                                          <option value="VU">Vanuatu</option>
                                          <option value="VA">Vatican</option>
                                          <option value="VE">Venezuela</option>
                                          <option value="VN">Vietnam</option>
                                          <option value="WF">Wallis and Futuna</option>
                                          <option value="EH">Western Sahara</option>
                                          <option value="YE">Yemen</option>
                                          <option value="ZM">Zambia</option>
                                          <option value="ZW">Zimbabwe</option>
                                      </select>
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_address_1" class="">Street Address &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="{{old('billing_address_1')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <input class="form-full input--lg" name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="{{old('billing_address_2')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_city">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="billing_city" id="billing_city" title="" value="{{old('billing_city')}}" placeholder="" required="" aria-required="true" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_state">State&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <select name="billing_state" id="billing_state" class="form-full input--lg" autocomplete="address-level1" data-placeholder="" tabindex="-1" aria-hidden="true">
                                          <option value="">Select an option…</option>
                                          <option value="AL">Alabama</option>
                                          <option value="AK">Alaska</option>
                                          <option value="AZ">Arizona</option>
                                          <option value="AR">Arkansas</option>
                                          <option value="CA">California</option>
                                          <option value="CO">Colorado</option>
                                          <option value="CT">Connecticut</option>
                                          <option value="DE">Delaware</option>
                                          <option value="DC">District Of Columbia</option>
                                          <option value="FL">Florida</option>
                                          <option value="GA">Georgia</option>
                                          <option value="HI">Hawaii</option>
                                          <option value="ID">Idaho</option>
                                          <option value="IL">Illinois</option>
                                          <option value="IN">Indiana</option>
                                          <option value="IA">Iowa</option>
                                          <option value="KS">Kansas</option>
                                          <option value="KY">Kentucky</option>
                                          <option value="LA">Louisiana</option>
                                          <option value="ME">Maine</option>
                                          <option value="MD">Maryland</option>
                                          <option value="MA">Massachusetts</option>
                                          <option value="MI">Michigan</option>
                                          <option value="MN">Minnesota</option>
                                          <option value="MS">Mississippi</option>
                                          <option value="MO">Missouri</option>
                                          <option value="MT">Montana</option>
                                          <option value="NE">Nebraska</option>
                                          <option value="NV">Nevada</option>
                                          <option value="NH">New Hampshire</option>
                                          <option value="NJ">New Jersey</option>
                                          <option value="NM">New Mexico</option>
                                          <option value="NY">New York</option>
                                          <option value="NC">North Carolina</option>
                                          <option value="ND">North Dakota</option>
                                          <option value="OH">Ohio</option>
                                          <option value="OK">Oklahoma</option>
                                          <option value="OR">Oregon</option>
                                          <option value="PA">Pennsylvania</option>
                                          <option value="RI">Rhode Island</option>
                                          <option value="SC">South Carolina</option>
                                          <option value="SD">South Dakota</option>
                                          <option value="TN">Tennessee</option>
                                          <option value="TX">Texas</option>
                                          <option value="UT">Utah</option>
                                          <option value="VT">Vermont</option>
                                          <option value="VA">Virginia</option>
                                          <option value="WA">Washington</option>
                                          <option value="WV">West Virginia</option>
                                          <option value="WI">Wisconsin</option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AA">Armed Forces (AA)</option>
                                          <option value="AE">Armed Forces (AE)</option>
                                          <option value="AP">Armed Forces (AP)</option>
                                      </select>
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_postcode">Zip&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="billing_postcode" id="billing_postcode" title="" value="{{old('billing_postcode')}}" placeholder="" required="" aria-required="true" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_phone">Phone &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="billing_phone" id="billing_phone" title="" value="{{old('billing_phone')}}" required="" aria-required="true" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-4567-8901"/>
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_email">Email Address  &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="billing_email" id="billing_email" title="" value="{{old('billing_email')}}" placeholder="" required="" aria-required="true" type="email" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label class="woocommerce-form__label" for="ship_to_different_address">
                                          <input id="ship_to_different_address" class="" name="ship_to_different_address" value="1" type="checkbox" style="margin-top: -6px;">
                                          <span>&nbsp;Ship to a different address?</span>
                                      </label>
                                  </p>
                                  <!-- <p class="form-field-wrapper col-sm-12">
                                      <label for="order_comments">Order Notes &nbsp;<span class="optional">(optional)</span></label>
                                      <textarea name="order_comments" class="form-full" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                  </p> -->
                              </div>
                          </div>
                          <div class="product-checkout-customer_details shipping_details">
                              <h3>Shipping Details</h3>
                              <div class="row billing-fields__field-wrapper">
                                  <p class="form-field-wrapper col-sm-6">
                                      <label for="billing_first_name">First Name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="shipping_first_name" id="shipping_first_name" title="First Name" value="{{old('shipping_first_name')}}" placeholder="First Name"  type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-6">
                                      <label for="billing_last_name" class="">Last Name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="shipping_last_name" id="shipping_last_name" placeholder="" value="{{old('shipping_last_name')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_company" class="">Company Name &nbsp;<span class="optional">(optional)</span></label>
                                      <input class="form-full input--lg" name="shipping_company" id="shipping_company" placeholder="" value="{{old('shipping_company')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_country" class="">Country &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <select name="shipping_country" id="shipping_country" class="form-full input--lg" autocomplete="country" tabindex="-1" aria-hidden="true">
                                          <option value="">Select a country…</option>
                                          <option value="AX">Åland Islands</option>
                                          <option value="AF">Afghanistan</option>
                                          <option value="AL">Albania</option>
                                          <option value="DZ">Algeria</option>
                                          <option value="AS">American Samoa</option>
                                          <option value="AD">Andorra</option>
                                          <option value="AO">Angola</option>
                                          <option value="AI">Anguilla</option>
                                          <option value="AQ">Antarctica</option>
                                          <option value="AG">Antigua and Barbuda</option>
                                          <option value="AR">Argentina</option>
                                          <option value="AM">Armenia</option>
                                          <option value="AW">Aruba</option>
                                          <option value="AU">Australia</option>
                                          <option value="AT">Austria</option>
                                          <option value="AZ">Azerbaijan</option>
                                          <option value="BS">Bahamas</option>
                                          <option value="BH">Bahrain</option>
                                          <option value="BD">Bangladesh</option>
                                          <option value="BB">Barbados</option>
                                          <option value="BY">Belarus</option>
                                          <option value="PW">Belau</option>
                                          <option value="BE">Belgium</option>
                                          <option value="BZ">Belize</option>
                                          <option value="BJ">Benin</option>
                                          <option value="BM">Bermuda</option>
                                          <option value="BT">Bhutan</option>
                                          <option value="BO">Bolivia</option>
                                          <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                          <option value="BA">Bosnia and Herzegovina</option>
                                          <option value="BW">Botswana</option>
                                          <option value="BV">Bouvet Island</option>
                                          <option value="BR">Brazil</option>
                                          <option value="IO">British Indian Ocean Territory</option>
                                          <option value="VG">British Virgin Islands</option>
                                          <option value="BN">Brunei</option>
                                          <option value="BG">Bulgaria</option>
                                          <option value="BF">Burkina Faso</option>
                                          <option value="BI">Burundi</option>
                                          <option value="KH">Cambodia</option>
                                          <option value="CM">Cameroon</option>
                                          <option value="CA">Canada</option>
                                          <option value="CV">Cape Verde</option>
                                          <option value="KY">Cayman Islands</option>
                                          <option value="CF">Central African Republic</option>
                                          <option value="TD">Chad</option>
                                          <option value="CL">Chile</option>
                                          <option value="CN">China</option>
                                          <option value="CX">Christmas Island</option>
                                          <option value="CC">Cocos (Keeling) Islands</option>
                                          <option value="CO">Colombia</option>
                                          <option value="KM">Comoros</option>
                                          <option value="CG">Congo (Brazzaville)</option>
                                          <option value="CD">Congo (Kinshasa)</option>
                                          <option value="CK">Cook Islands</option>
                                          <option value="CR">Costa Rica</option>
                                          <option value="HR">Croatia</option>
                                          <option value="CU">Cuba</option>
                                          <option value="CW">Curaçao</option>
                                          <option value="CY">Cyprus</option>
                                          <option value="CZ">Czech Republic</option>
                                          <option value="DK">Denmark</option>
                                          <option value="DJ">Djibouti</option>
                                          <option value="DM">Dominica</option>
                                          <option value="DO">Dominican Republic</option>
                                          <option value="EC">Ecuador</option>
                                          <option value="EG">Egypt</option>
                                          <option value="SV">El Salvador</option>
                                          <option value="GQ">Equatorial Guinea</option>
                                          <option value="ER">Eritrea</option>
                                          <option value="EE">Estonia</option>
                                          <option value="ET">Ethiopia</option>
                                          <option value="FK">Falkland Islands</option>
                                          <option value="FO">Faroe Islands</option>
                                          <option value="FJ">Fiji</option>
                                          <option value="FI">Finland</option>
                                          <option value="FR">France</option>
                                          <option value="GF">French Guiana</option>
                                          <option value="PF">French Polynesia</option>
                                          <option value="TF">French Southern Territories</option>
                                          <option value="GA">Gabon</option>
                                          <option value="GM">Gambia</option>
                                          <option value="GE">Georgia</option>
                                          <option value="DE">Germany</option>
                                          <option value="GH">Ghana</option>
                                          <option value="GI">Gibraltar</option>
                                          <option value="GR">Greece</option>
                                          <option value="GL">Greenland</option>
                                          <option value="GD">Grenada</option>
                                          <option value="GP">Guadeloupe</option>
                                          <option value="GU">Guam</option>
                                          <option value="GT">Guatemala</option>
                                          <option value="GG">Guernsey</option>
                                          <option value="GN">Guinea</option>
                                          <option value="GW">Guinea-Bissau</option>
                                          <option value="GY">Guyana</option>
                                          <option value="HT">Haiti</option>
                                          <option value="HM">Heard Island and McDonald Islands</option>
                                          <option value="HN">Honduras</option>
                                          <option value="HK">Hong Kong</option>
                                          <option value="HU">Hungary</option>
                                          <option value="IS">Iceland</option>
                                          <option value="IN">India</option>
                                          <option value="ID">Indonesia</option>
                                          <option value="IR">Iran</option>
                                          <option value="IQ">Iraq</option>
                                          <option value="IE">Ireland</option>
                                          <option value="IM">Isle of Man</option>
                                          <option value="IL">Israel</option>
                                          <option value="IT">Italy</option>
                                          <option value="CI">Ivory Coast</option>
                                          <option value="JM">Jamaica</option>
                                          <option value="JP">Japan</option>
                                          <option value="JE">Jersey</option>
                                          <option value="JO">Jordan</option>
                                          <option value="KZ">Kazakhstan</option>
                                          <option value="KE">Kenya</option>
                                          <option value="KI">Kiribati</option>
                                          <option value="KW">Kuwait</option>
                                          <option value="KG">Kyrgyzstan</option>
                                          <option value="LA">Laos</option>
                                          <option value="LV">Latvia</option>
                                          <option value="LB">Lebanon</option>
                                          <option value="LS">Lesotho</option>
                                          <option value="LR">Liberia</option>
                                          <option value="LY">Libya</option>
                                          <option value="LI">Liechtenstein</option>
                                          <option value="LT">Lithuania</option>
                                          <option value="LU">Luxembourg</option>
                                          <option value="MO">Macao S.A.R., China</option>
                                          <option value="MK">Macedonia</option>
                                          <option value="MG">Madagascar</option>
                                          <option value="MW">Malawi</option>
                                          <option value="MY">Malaysia</option>
                                          <option value="MV">Maldives</option>
                                          <option value="ML">Mali</option>
                                          <option value="MT">Malta</option>
                                          <option value="MH">Marshall Islands</option>
                                          <option value="MQ">Martinique</option>
                                          <option value="MR">Mauritania</option>
                                          <option value="MU">Mauritius</option>
                                          <option value="YT">Mayotte</option>
                                          <option value="MX">Mexico</option>
                                          <option value="FM">Micronesia</option>
                                          <option value="MD">Moldova</option>
                                          <option value="MC">Monaco</option>
                                          <option value="MN">Mongolia</option>
                                          <option value="ME">Montenegro</option>
                                          <option value="MS">Montserrat</option>
                                          <option value="MA">Morocco</option>
                                          <option value="MZ">Mozambique</option>
                                          <option value="MM">Myanmar</option>
                                          <option value="NA">Namibia</option>
                                          <option value="NR">Nauru</option>
                                          <option value="NP">Nepal</option>
                                          <option value="NL">Netherlands</option>
                                          <option value="NC">New Caledonia</option>
                                          <option value="NZ">New Zealand</option>
                                          <option value="NI">Nicaragua</option>
                                          <option value="NE">Niger</option>
                                          <option value="NG">Nigeria</option>
                                          <option value="NU">Niue</option>
                                          <option value="NF">Norfolk Island</option>
                                          <option value="KP">North Korea</option>
                                          <option value="MP">Northern Mariana Islands</option>
                                          <option value="NO">Norway</option>
                                          <option value="OM">Oman</option>
                                          <option value="PK">Pakistan</option>
                                          <option value="PS">Palestinian Territory</option>
                                          <option value="PA">Panama</option>
                                          <option value="PG">Papua New Guinea</option>
                                          <option value="PY">Paraguay</option>
                                          <option value="PE">Peru</option>
                                          <option value="PH">Philippines</option>
                                          <option value="PN">Pitcairn</option>
                                          <option value="PL">Poland</option>
                                          <option value="PT">Portugal</option>
                                          <option value="PR">Puerto Rico</option>
                                          <option value="QA">Qatar</option>
                                          <option value="RE">Reunion</option>
                                          <option value="RO">Romania</option>
                                          <option value="RU">Russia</option>
                                          <option value="RW">Rwanda</option>
                                          <option value="ST">São Tomé and Príncipe</option>
                                          <option value="BL">Saint Barthélemy</option>
                                          <option value="SH">Saint Helena</option>
                                          <option value="KN">Saint Kitts and Nevis</option>
                                          <option value="LC">Saint Lucia</option>
                                          <option value="SX">Saint Martin (Dutch part)</option>
                                          <option value="MF">Saint Martin (French part)</option>
                                          <option value="PM">Saint Pierre and Miquelon</option>
                                          <option value="VC">Saint Vincent and the Grenadines</option>
                                          <option value="WS">Samoa</option>
                                          <option value="SM">San Marino</option>
                                          <option value="SA">Saudi Arabia</option>
                                          <option value="SN">Senegal</option>
                                          <option value="RS">Serbia</option>
                                          <option value="SC">Seychelles</option>
                                          <option value="SL">Sierra Leone</option>
                                          <option value="SG">Singapore</option>
                                          <option value="SK">Slovakia</option>
                                          <option value="SI">Slovenia</option>
                                          <option value="SB">Solomon Islands</option>
                                          <option value="SO">Somalia</option>
                                          <option value="ZA">South Africa</option>
                                          <option value="GS">South Georgia/Sandwich Islands</option>
                                          <option value="KR">South Korea</option>
                                          <option value="SS">South Sudan</option>
                                          <option value="ES">Spain</option>
                                          <option value="LK">Sri Lanka</option>
                                          <option value="SD">Sudan</option>
                                          <option value="SR">Suriname</option>
                                          <option value="SJ">Svalbard and Jan Mayen</option>
                                          <option value="SZ">Swaziland</option>
                                          <option value="SE">Sweden</option>
                                          <option value="CH">Switzerland</option>
                                          <option value="SY">Syria</option>
                                          <option value="TW">Taiwan</option>
                                          <option value="TJ">Tajikistan</option>
                                          <option value="TZ">Tanzania</option>
                                          <option value="TH">Thailand</option>
                                          <option value="TL">Timor-Leste</option>
                                          <option value="TG">Togo</option>
                                          <option value="TK">Tokelau</option>
                                          <option value="TO">Tonga</option>
                                          <option value="TT">Trinidad and Tobago</option>
                                          <option value="TN">Tunisia</option>
                                          <option value="TR">Turkey</option>
                                          <option value="TM">Turkmenistan</option>
                                          <option value="TC">Turks and Caicos Islands</option>
                                          <option value="TV">Tuvalu</option>
                                          <option value="UG">Uganda</option>
                                          <option value="UA">Ukraine</option>
                                          <option value="AE">United Arab Emirates</option>
                                          <option value="GB">United Kingdom (UK)</option>
                                          <option value="US" selected="selected">United States (US)</option>
                                          <option value="UM">United States (US) Minor Outlying Islands</option>
                                          <option value="VI">United States (US) Virgin Islands</option>
                                          <option value="UY">Uruguay</option>
                                          <option value="UZ">Uzbekistan</option>
                                          <option value="VU">Vanuatu</option>
                                          <option value="VA">Vatican</option>
                                          <option value="VE">Venezuela</option>
                                          <option value="VN">Vietnam</option>
                                          <option value="WF">Wallis and Futuna</option>
                                          <option value="EH">Western Sahara</option>
                                          <option value="YE">Yemen</option>
                                          <option value="ZM">Zambia</option>
                                          <option value="ZW">Zimbabwe</option>
                                      </select>
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_address_1" class="">Street Address &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="shipping_address_1" id="shipping_address_1" placeholder="House number and street name" value="{{old('shipping_address_1')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <input class="form-full input--lg" name="shipping_address_2" id="shipping_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="{{old('shipping_address_2')}}" type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="shipping_city">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="shipping_city" id="shipping_city" title="" value="{{old('shipping_city')}}" placeholder=""  type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="shipping_state">State&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <select name="shipping_state" id="shipping_state" class="form-full input--lg" autocomplete="address-level1" data-placeholder="" tabindex="-1" aria-hidden="true">
                                          <option value="">Select an option…</option>
                                          <option value="AL">Alabama</option>
                                          <option value="AK">Alaska</option>
                                          <option value="AZ">Arizona</option>
                                          <option value="AR">Arkansas</option>
                                          <option value="CA">California</option>
                                          <option value="CO">Colorado</option>
                                          <option value="CT">Connecticut</option>
                                          <option value="DE">Delaware</option>
                                          <option value="DC">District Of Columbia</option>
                                          <option value="FL">Florida</option>
                                          <option value="GA">Georgia</option>
                                          <option value="HI">Hawaii</option>
                                          <option value="ID">Idaho</option>
                                          <option value="IL">Illinois</option>
                                          <option value="IN">Indiana</option>
                                          <option value="IA">Iowa</option>
                                          <option value="KS">Kansas</option>
                                          <option value="KY">Kentucky</option>
                                          <option value="LA">Louisiana</option>
                                          <option value="ME">Maine</option>
                                          <option value="MD">Maryland</option>
                                          <option value="MA">Massachusetts</option>
                                          <option value="MI">Michigan</option>
                                          <option value="MN">Minnesota</option>
                                          <option value="MS">Mississippi</option>
                                          <option value="MO">Missouri</option>
                                          <option value="MT">Montana</option>
                                          <option value="NE">Nebraska</option>
                                          <option value="NV">Nevada</option>
                                          <option value="NH">New Hampshire</option>
                                          <option value="NJ">New Jersey</option>
                                          <option value="NM">New Mexico</option>
                                          <option value="NY">New York</option>
                                          <option value="NC">North Carolina</option>
                                          <option value="ND">North Dakota</option>
                                          <option value="OH">Ohio</option>
                                          <option value="OK">Oklahoma</option>
                                          <option value="OR">Oregon</option>
                                          <option value="PA">Pennsylvania</option>
                                          <option value="RI">Rhode Island</option>
                                          <option value="SC">South Carolina</option>
                                          <option value="SD">South Dakota</option>
                                          <option value="TN">Tennessee</option>
                                          <option value="TX">Texas</option>
                                          <option value="UT">Utah</option>
                                          <option value="VT">Vermont</option>
                                          <option value="VA">Virginia</option>
                                          <option value="WA">Washington</option>
                                          <option value="WV">West Virginia</option>
                                          <option value="WI">Wisconsin</option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AA">Armed Forces (AA)</option>
                                          <option value="AE">Armed Forces (AE)</option>
                                          <option value="AP">Armed Forces (AP)</option>
                                      </select>
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_postcode">Zip&nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="shipping_postcode" id="shipping_postcode" title="" value="{{old('shipping_postcode')}}" placeholder=""  type="text" />
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_phone">Phone &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="shipping_phone" id="shipping_phone" title="" value="{{old('shipping_phone')}}" type="text"  type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-4567-8901"/>
                                  </p>
                                  <p class="form-field-wrapper col-sm-12">
                                      <label for="billing_email">Email Address  &nbsp;<abbr class="required" title="required">*</abbr></label>
                                      <input class="form-full input--lg" name="shipping_email" id="shipping_email" title="" value="{{old('shipping_email')}}" placeholder=""  type="email" />
                                  </p>


                              </div>
                          </div>
                          <div class="product-checkout-customer_details billing_details">
                            <div class="row billing-fields__field-wrapper">
                              <p>&nbsp</p>
                                <p class="form-field-wrapper col-sm-12">
                                    <label for="order_comments">Order Notes &nbsp;<span class="optional">(optional)</span></label>
                                    <textarea name="order_comments" class="form-full" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                </p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                      <div class="product-checkout-review-order">
                              <h3>Your Order</h3>
                              <div class="order_review">
                                  <table>
                                      <thead>
                                          <tr>
                                              <th class="product-name">Product</th>
                                              <th class="product-total">Total</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $total = 0;
                                        if(count($final_data) > 0) {
                                        foreach ($final_data['id'] as $key=>$final_value)
                                        {
                                          ?>
                                          <tr class="cart_item">
                                              <td class="product-name"><?php echo $final_data['name'][$key]; ?>&nbsp;<strong class="product-qty">× <?php echo $final_data['product_qty'][$key]; ?></strong></td>
                                              <td class="product-total"><span class="amount"><span class="Price-currencySymbol">$</span><?php echo $final_data['retailPrice'][$key]; ?></span></td>
                                          </tr>
                                          <input type="hidden" name="pname[]" value="<?php echo $final_data['name'][$key]; ?>">
                                          <input type="hidden" name="pqty[]" value="<?php echo $final_data['product_qty'][$key]; ?>">
                                          <input type="hidden" name="pprice[]" value="<?php echo $final_data['retailPrice'][$key]; ?>">

                                            <?php
                                            $total = $total + ($final_data['retailPrice'][$key] * $final_data['product_qty'][$key]);
                                          }
                                        }
                                            ?>
                                            <input type="hidden" name="ptotal" value="<?php echo $total; ?>">
                                      </tbody>

                                      <div>
                                          <tr class="cart-subtotal">
                                              <th>Subtotal</th>
                                              <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo $total; ?></span></td>
                                          </tr>
                                          <tr class="shipping">
                                              <th>Shipping</th>
                                              <td data-title="Shipping">
                                                  <ul class="shipping_method">
                                                      <li>
                                                          <input name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate2" value="flat_rate:2" class="shipping_method" checked="checked" type="radio">
                                                          <label for="shipping_method_0_flat_rate2">Flat rate: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>10.00</span></label>
                                                      </li>
                                                      <li>
                                                          <input name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping3" value="free_shipping:3" class="shipping_method" type="radio">
                                                          <label for="shipping_method_0_free_shipping3">Free shipping</label>
                                                      </li>
                                                      <li>
                                                          <input name="shipping_method[0]" data-index="0" id="shipping_method_0_local_pickup4" value="local_pickup:4" class="shipping_method" type="radio">
                                                          <label for="shipping_method_0_local_pickup4">Local pickup: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>0.00</span></label>
                                                      </li>
                                                  </ul>
                                              </td>
                                          </tr>
                                          <tr class="order-total">
                                              <th>Total</th>
                                              <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo $total; ?></span></strong> </td>
                                          </tr>
                                      </div>
                                  </table>
                                  <div class="checkout-payment">
                                      <ul>
                                          <li>
                                              <label>
                                                  Check payments
                                              </label>
                                              <div class="payment_method_cheque">
                                                  <p>
                                                      Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                  </p>
                                              </div>
                                          </li>
                                      </ul>
                                      <div class="panel panel-default credit-card-box">
                                          <div class="panel-heading display-table" >
                                              <div class="row display-tr" >
                                                  <h3 class="panel-title display-td" >Payment Details</h3>
                                                  <div class="display-td" >
                                                      <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="panel-body">

                                              @if (Session::has('success'))
                                                  <div class="alert alert-success text-center">
                                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                      <p>{{ Session::get('success') }}</p>
                                                  </div>
                                              @endif
                                                  @csrf

                                                  <div class='form-field-wrapper col-sm-6'>
                                                      <!-- <div class='col-xs-12 col-md-6 form-group required'> -->
                                                          <label class='control-label'>Name on Card</label>
                                                          <input class='form-control' size='4' type='text' value="Ahsan">
                                                      <!-- </div> -->
                                                  </div>

                                                  <div class='form-field-wrapper col-sm-6'>
                                                      <!-- <div class='col-xs-12 col-md-6  form-group card required'> -->
                                                          <label class='control-label'>Card Number</label>
                                                          <input autocomplete='off' class='form-control card-number' size='20' type='text' value="4242424242424242">
                                                      <!-- </div> -->
                                                  </div>

                                                  <!-- <div class='form-row row'> -->
                                                      <div class='form-field-wrapper col-md-12  cvc required'>
                                                          <label class='control-label'>CVC</label>
                                                          <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' value="123">
                                                      </div>
                                                      <div class='form-field-wrapper col-md-6  expiration '>
                                                          <label class='control-label'>Expiration Month</label>
                                                          <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' value="01">
                                                      </div>
                                                      <div class='form-field-wrapper col-md-6  expiration '>
                                                          <label class='control-label'>Expiration Year</label> <input
                                                              class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' value="2022">
                                                      </div>
                                                  <!-- </div> -->

                                                  <div class='form-row row'>
                                                      <div class='col-md-12 error form-group hide'>
                                                          <div class='alert-danger alert'>Please correct the errors and try
                                                              again.</div>
                                                      </div>
                                                  </div>

                                                  <!-- <div class="row">
                                                      <div class="col-xs-12">
                                                          <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                                                      </div>
                                                  </div> -->

                                              <!-- </form> -->
                                          </div>
                                      <div class="place-order">
                                          <div class="terms-and-conditions-wrapper">
                                              <p>
                                                  Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
                                              </p>
                                              <p>
                                                  <label>
                                                      <input class="" name="terms" id="terms" type="checkbox">&nbsp;
                                                  <span class="woocommerce-terms-and-conditions-checkbox-text">I have read and agree to the website <a href="#" class="woocommerce-terms-and-conditions-link" target="_blank">Terms and Conditions</a></span>
                                                  </label>
                                              </p>
                                          </div>
                                          <button type="submit" class="btn btn--lg btn--primary btn--full" name="checkout_place_order" id="place_order" value="Place order" data-value="Place Order">Place Order</button>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>

                    </form>

              </div>
            </section>
            <!--End Content-->
        </div>
        <!--End Page Body Content -->

        @include('template/frontend/themes/mazaar/includes/footer/footer')
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

        <script type="text/javascript">

          $(".shipping_details").hide();

          $("#ship_to_different_address").change(function(){ //capture when the checkbox is clicked
              //if($(this).is(":checked")){

                 $(".shipping_details").toggle();

                // check if it is checked or not (goto else)
          		// $("[id^='shipping_']").each(function(){ // for each input whose ID starts with shipping_
          		// 	data=$(this).attr("id"); // get the full id of the input - e.g. shipping_first_name
          		// 	tmpID = data.split('shipping_'); // split the ID so we get an array with e.g. a blank first element and a second element with the value first_name - tmpID[0]=nothing and tmpID[1]=the input ID with shipping_ removed
          		// 	$(this).val($("#billing_"+tmpID[1]).val()); // set the value of the corresponding shipping input with the value of the corresponding billing input - as above tmpID[1] would equal first_name
          		// })
              // }
              // else{
          		// $("[id^='shipping_']").each(function(){
          		// 	$(this).val(""); // checkbox is not checked so clear all inputs whose ID starts with shipping_
          		// });
              //   }
          });


        $(function() {
          var $form         = $(".require-validation");
          $('form.require-validation').bind('submit', function(e) {
            if($('#ship_to_different_address').prop("checked") == false){
              // alert('sfsdfd');
            $("[id^='shipping_']").each(function(){ // for each input whose ID starts with shipping_
              data=$(this).attr("id"); // get the full id of the input - e.g. shipping_first_name
              tmpID = data.split('shipping_'); // split the ID so we get an array with e.g. a blank first element and a second element with the value first_name - tmpID[0]=nothing and tmpID[1]=the input ID with shipping_ removed
              $(this).val($("#billing_"+tmpID[1]).val()); // set the value of the corresponding shipping input with the value of the corresponding billing input - as above tmpID[1] would equal first_name
            });
          }

            var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=hidden]','input[type=file]',
                                 'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
              }
            });

            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }

          });

          function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var card = response['card'];
                    // console.log(card);
                    // alert(card.exp_month);

                    var token = response['id'];
                    var issuer = card.brand;
                    var last4 = card.last4;
                    var expMonth = card.exp_month;
                    var expYear = card.exp_year;
                    console.log(response['card']);
                    // return false;
                    // insert the token into the form so it gets submitted to the server
                    // $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.append("<input type='hidden' name='brand' value='" + issuer + "'/>");
                    $form.append("<input type='hidden' name='last4' value='" + last4 + "'/>");
                    $form.append("<input type='hidden' name='exp_month' value='" + expMonth + "'/>");
                    $form.append("<input type='hidden' name='exp_year' value='" + expYear + "'/>");
                    $form.get(0).submit();
                }
            }

        });
        </script>
    </div>
    <!-- Site Wraper End -->
@stop
