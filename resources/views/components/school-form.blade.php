<div>
    @php
        $isCreateForm = $isCreateForm()
    @endphp
    <form role="form" method="POST" action="{{ $isCreateForm ? route('school.store') : route('school.update', $schoolData->id) }}" enctype="multipart/form-data">
        @csrf
        @if (!$isCreateForm)
            @method('PUT')
        @endif
        <div class="box-body">
            <div class="form-section">
                <h4 class="form-section__heading">Basic Information</h4>
                <div class="form-section__body">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="urnInput">URN Number *</label>
                              <input type="number" class="form-control" id="urnInput" placeholder="Enter URN Number" name="urn" value="{{ old('urn') }}" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="schoolName">School Name *</label>
                                <input type="text" class="form-control" id="schoolName" placeholder="Enter School Name" name="name" value="{{ old('name') }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="schoolType">School Type *</label>
                                {{-- {{$schoolTypes}} --}}
                                <select name="type" id="schoolType" class="form-control" required>
                                  <option value="">Select Type</option>
                                  <option value="primary" {{ old('type') === 'nursary' ? 'selected' : '' }}>Primary School</option>
                                  <option value="primary" {{ old('type') === 'primary' ? 'selected' : '' }}>Primary School</option>
                                  <option value="secondary" {{ old('type') === 'secondary' ? 'selected' : '' }}>Secondary School</option>
                                  <option value="not-applicable" {{ old('type') === 'not-applicable' ? 'selected' : '' }}>Not Applicable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="schoolLogo">Logo</label>
                                <input type="file" id="schoolLogo" name="image" placeholder="Please Choose Logo File" />
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <h4 class="form-section__heading">Address</h4>
                <div class="form-section__body">
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="phoneInput">Phone Number *</label>
                              <input type="number" class="form-control" id="phoneInput" placeholder="Enter Phone Number" name="phone" value="{{ old('phone') }}" required />
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="faxInput">Fax Number</label>
                                <input type="text" class="form-control" id="faxInput" placeholder="Enter Fax Number" name="fax" value="{{ old('fax') }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="postInput">Post Code *</label>
                                <input type="text" class="form-control" id="postInput" placeholder="Enter Post Code" name="post_code" value="{{ old('post_code') }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="streetInput">Street *</label>
                            <input type="text" class="form-control" id="streetInput" name="street" placeholder="Enter Street" value="{{ old('street') }}" required />
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="localityInput">Locality</label>
                                <input type="text" class="form-control" id="localityInput" name="locality" placeholder="Enter Locality" value="{{ old('locality') }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="townInput">Town *</label>
                                <input type="text" class="form-control" id="townInput" name="town" placeholder="Enter Town" required value="{{ old('town') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address-3Input">Address 3</label>
                        <input type="text" class="form-control" id="address-3Input" name="address_3" placeholder="Enter Address 3" value="{{ old('address_3') }}" />
                    </div>
                    <div class="form-group">
                        <label for="websiteInput">Website</label>
                        <input type="text" class="form-control" id="websiteInput" name="website" placeholder="Enter Website" value="{{ old('website') }}" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="longitudeInput">Longitude</label>
                            <input type="text" class="form-control" id="longitudeInput" name="longitude" placeholder="Enter Longitude" value="{{ old('longitude') }}" />
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitudeInput">Latitude</label>
                                <input type="text" class="form-control" id="latitudeInput" name="latitude" placeholder="Enter Latitude" value="{{ old('latitude') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <h4 class="form-section__heading">Principal Information</h4>
                <div class="form-section__body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="principalName">Principal's Full Name *</label>
                                <input type="text" class="form-control" id="principalName" placeholder="Enter Principal's Full Name" name="principalName" value="{{ old('principalName') }}" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="emailInput">Main Email Address *</label>
                              <input type="email" class="form-control" id="emailInput" placeholder="Enter Main Email Address" name="email" value="{{ old('email') }}" required />
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">
              <i class="{{ $isCreateForm ? 'ion-clipboard' : 'ion-edit' }} mr-2"></i>
              {{ $isCreateForm ? 'Register School' : 'Update Information' }}
          </button>
          <p></p>
        </div>
      </form>
</div>