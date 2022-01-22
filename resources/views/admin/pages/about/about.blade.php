@extends('admin.layouts.app')
@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

          <div class="col-12">

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @include('common.errors.validate_admin')
                            @include('common.alert')
                        </div>
                    </div>

                    <form action="{{ route('admin.about.save', @$entry->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h5 class="col-12">Logo</h5>
                            <div class="col-12 p-3">
                                <img style="width: 144px;" src={{ asset('images/' . old('logo', $entry['logo']))}} />
                            </div>
                            <input type="file" name="logo"/>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">PROGRAMS & COURSES:</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="courses" placeholder="Məzun" class="form-control" value="{{ old('courses', $entry['courses']) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">OUR BOOK STORE:</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="books" placeholder="Tələbə" class="form-control" value="{{ old('books', $entry['books']) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">YEARS OF EXPERIENCE:</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="experience" placeholder="Müəllim" class="form-control" value="{{ old('experience', $entry['experience']) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Email:</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email', $entry['email']) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Ünvan:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="address" placeholder="Ünvan" class="form-control" value="{{ old('address', $entry['address']) }}"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Google Map:</label>
                                    <div class="col-sm-8">
                                        <input type="url" name="map" placeholder="Map Url" class="form-control" value="{{ old('map', $entry['map']) }}"/>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Başlama:</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="start_day" class="form-control" value="{{ old('start_day', $entry['start_day']) }}">
                                                    <option value="" @if ($entry['start_day'] == null) {{ 'selected' }} @endif>-</option>
                                                    <option value="Mon" @if ($entry['start_day'] == "Mon") {{ 'selected' }} @endif>Monday</option>
                                                    <option value="Tue" @if ($entry['start_day'] == "Tue") {{ 'selected' }} @endif>Tuesday</option>
                                                    <option value="Wed" @if ($entry['start_day'] == "Wed") {{ 'selected' }} @endif>Wednesday</option>
                                                    <option value="Thu" @if ($entry['start_day'] == "Thu") {{ 'selected' }} @endif>Thursday</option>
                                                    <option value="Fri" @if ($entry['start_day'] == "Fri") {{ 'selected' }} @endif>Friday</option>
                                                    <option value="Sat" @if ($entry['start_day'] == "Sat") {{ 'selected' }} @endif>Saturday</option>
                                                    <option value="Sun" @if ($entry['start_day'] == "Sun") {{ 'selected' }} @endif>Sunday</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $entry['start_time']) }}"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Bitmə:</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="end_day" class="form-control" value="{{ old('end_day', $entry['end_day']) }}">
                                                    <option value="" @if ($entry['end_day'] == null) {{ 'selected' }} @endif>-</option>
                                                    <option value="Mon" @if ($entry['end_day'] == "Mon") {{ 'selected' }} @endif>Monday</option>
                                                    <option value="Tue" @if ($entry['end_day'] == "Tue") {{ 'selected' }} @endif>Tuesday</option>
                                                    <option value="Wed" @if ($entry['end_day'] == "Wed") {{ 'selected' }} @endif>Wednesday</option>
                                                    <option value="Thu" @if ($entry['end_day'] == "Thu") {{ 'selected' }} @endif>Thursday</option>
                                                    <option value="Fri" @if ($entry['end_day'] == "Fri") {{ 'selected' }} @endif>Friday</option>
                                                    <option value="Sat" @if ($entry['end_day'] == "Sat") {{ 'selected' }} @endif>Saturday</option>
                                                    <option value="Sun" @if ($entry['end_day'] == "Sun") {{ 'selected' }} @endif>Sunday</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $entry['end_time']) }}"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Mobile:</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="mobile" placeholder="Mobile" class="form-control" value="{{ old('mobile', $entry['mobile']) }}"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Phone:</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone" placeholder="Phone" class="form-control" value="{{ old('phone', $entry['phone']) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Instagram:</label>
                                    <div class="col-sm-8">
                                        <input type="url" name="instagram" placeholder="Instagram" class="form-control" value="{{ old('instagram', $entry['instagram']) }}"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Twitter:</label>
                                    <div class="col-sm-8">
                                        <input type="url" name="twitter" placeholder="Twitter" class="form-control" value="{{ old('twitter', $entry['twitter']) }}"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Facebook:</label>
                                    <div class="col-sm-8">
                                        <input type="url" name="facebook" placeholder="Facebook" class="form-control" value="{{ old('facebook', $entry['facebook']) }}"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label class="col-sm-4">Youtube:</label>
                                    <div class="col-sm-8">
                                        <input type="url" name="youtube" placeholder="Youtube" class="form-control" value="{{ old('youtube', $entry['youtube']) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h3>English</h3>
                            <div class="col-12" style="max-height: 350px; overflow: auto; ">
                                <textarea id="summernote_en" name="text_en"  class="summernote form-control">{{ old('text_en', $entry['text_en']) }}</textarea>
                            </div>
                            <h3>Azərbaycan</h3>
                            <div class="col-12" style="max-height: 350px; overflow: auto; ">
                                <textarea id="summernote_az" name="text_az"  class="summernote form-control">{{ old('text_az', $entry['text_az']) }}</textarea>
                            </div>
                            <h3>Русский</h3>
                            <div class="col-12" style="max-height: 350px; overflow: auto; ">
                                <textarea id="summernote_ru" name="text_ru"  class="summernote form-control">{{ old('text_ru', $entry['text_ru']) }}</textarea>
                            </div>
                            <div class="col-12 clearfix mt-2">
                                <button type="submit" class="btn btn-success float-right">Saxla</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
      </div>
    </div>
 </section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
