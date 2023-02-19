
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="{{ route('appointments.approve', $appointment->id) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Visit Approval</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-10 offset-sm-1">
                
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-sm-6">
                            <label class="mb-1" for="first_name">First Name</label>
                            <input class="form-control" name="first_name" type="text"
                                placeholder="Enter first name" value="{{ $appointment->first_name }}" required readonly />
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-sm-6">
                            <label class="mb-1" for="last_name">Last Name</label>
                            <input class="form-control" name="last_name" type="text"
                                placeholder="Enter last name" value="{{ $appointment->last_name }}" required readonly />
                        </div>
                    </div>

                    <!-- Form Group (Profile Pic)-->
                    <div class="mb-3">
                        <label class="mb-1" for="photo">Upload Photo</label>
                        <input class="form-control" name="photo" type="file" />
                    </div>

                    <div class="row gx-3 mb-3">
                        <!-- Form Group (Phone)-->
                        <div class="col-sm-6">
                            <label class="mb-1" for="phone">Phone Number</label>
                            <input class="form-control" name="phone" type="text"
                                placeholder="Enter phone number" value="{{ $appointment->phone }}" readonly />
                        </div>

                        <!-- Form Group (Email Address)-->
                        <div class="col-sm-6">
                            <label class="mb-1" for="email">Email Address</label>
                            <input class="form-control" name="email" type="email"
                                placeholder="Enter email address : optional" value="{{ $appointment->email }}" readonly/>
                        </div>
                        
                    </div>

                    <!-- Form Group (company name)-->
                    <div class="mb-3">
                        <label class="mb-1" for="company">Company Name</label>
                        <input class="form-control" name="company" type="text"
                            placeholder="Enter company name" value="{{ $appointment->company }}" required readonly/>
                    </div>

                    <div class="row gx-3 mb-3">
                        <!-- Form Group (Location)-->
                        <div class="col-sm-6">
                            <label class="mb-1" for="location_id">Location</label>
                            <select class="form-select" name="location_id" aria-label="Default select example"
                                required>
                                    <option value="{{ $appointment->location_id }}">{{ $appointment->location->name }}</option>
                            </select>
                        </div>

                        <!-- Form Group (Department)-->
                        <div class="col-sm-6">
                            <label class="mb-1" for="department_id">Destination</label>
                            <select class="form-select" name="department_id" aria-label="Default select example"
                                required>
                                    <option value="{{ $appointment->department_id }}">{{ $appointment->department->name }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label class="mb-1" for="tag_id">Enter Tag Number</label>
                        <input class="form-control" name="tag_id" type="number" required />
                        {{-- <select class="form-select" name="tag_id" aria-label="Default select example" required> --}}
                            {{-- <option selected>Assign Tag</option> --}}
                            {{-- @foreach ($tags as $tag) --}}
                                {{-- <option value="{{ $tag->id }}">{{ $tag->number }}</option> --}}
                            {{-- @endforeach --}}
                        {{-- </select> --}}
                    </div>

                    <!-- Form Group (Staff)-->
                    <div class="mb-3">
                        <label class="mb-1" for="staff_email">Receiving Staff</label>
                        <input class="form-control" name="staff_name" type="text" value="{{ $appointment->staff->name }}" required readonly/>
                        {{-- <staff-search-component></staff-search-component> --}}
                    </div>

                    <!-- Submit button-->
                    {{-- <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                    </div> --}}
                
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <form action="{{ route('appointments.approve', $appointment->id) }}" method="post"> --}}
            {{-- @csrf --}}
            <button class="btn btn-success" type="submit">Approve</button>
        {{-- </form> --}}
        </div>
      </div>
    </div>
    </form>
  </div>