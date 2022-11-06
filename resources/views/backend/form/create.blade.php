@extends('layouts.backend')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    @include('partials.backend.nav')

    @include('partials.backend.aside', ['asideSelected' => 'form'])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Symptoms Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.form.index') }}">Symptoms Form</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @include('partials.backend.flash-message')
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('backend.form.store') }}" method="POST" id="addForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="patient_id" value="{{$patient_id}}">
                            <!-- Default box -->
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Add Symptoms Form</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>



                                <div class="card-body">

                                    <div class="form-group row required">
                                        <label for="diagnoses" class="col-sm-3 col-form-label">{{ __('form.question.diagnoses') }}</label>
                                        <div class="col-sm-9">
                                            <input id="diagnoses" type="text" name="diagnoses" value="{{ old('diagnoses') }}" class="form-control @error('diagnoses') is-invalid @enderror" placeholder="{{ __('form.placeholder.diagnoses') }}">
                                            @error('diagnoses')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="past_medical_history" class="col-sm-3 col-form-label">{{ __('form.question.past_medical_history') }}</label>
                                        <div class="col-sm-9">
                                            <input id="past_medical_history" type="text" name="past_medical_history" value="{{ old('past_medical_history') }}" class="form-control @error('past_medical_history') is-invalid @enderror" placeholder="{{ __('form.placeholder.past_medical_history') }}">
                                            @error('past_medical_history')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="chest_pain" class="col-sm-3 col-form-label">{{ __('form.question.chest_pain') }}</label>
                                        <div class="col-sm-9 full_question">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="chest_pain_yes" name="chest_pain" value="1">
                                                <label for="chest_pain_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button" id="chest_pain_no" name="chest_pain" value="0" checked>
                                                <label for="chest_pain_no">
                                                    No
                                                </label>
                                            </div>
                                            @error('chest_pain')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror


                                            <span>{{ __('form.placeholder.chest_pain') }} </span>
                                            <div class="show_if_yes hide">
                                                <div class="sub_questions">
                                                    <label class="sub_question_label">{{ __('form.question.chest_pain_a')}}</label>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="in_day_less_five" name="pain_in_day" value="less_five">
                                                        <label for="in_day_less_five">
                                                            < 5 </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="in_day_five_ten" name="pain_in_day" value="five_ten">
                                                        <label for="in_day_five_ten">
                                                            5 - 10
                                                        </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="in_day_greter_ten" name="pain_in_day" value="greter_ten">
                                                        <label for="in_day_greter_ten">
                                                            > 10
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <label class="sub_question_label">{{ __('form.question.chest_pain_b')}}</label>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="feel_pain_center" name="feel_pain_place" value="center">
                                                        <label for="feel_pain_center">
                                                            Center
                                                        </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="feel_pain_left" name="feel_pain_place" value="left">
                                                        <label for="feel_pain_left">
                                                            Left
                                                        </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="feel_pain_right" name="feel_pain_place" value="right">
                                                        <label for="feel_pain_right">
                                                            Right
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <label class="sub_question_label">{{ __('form.question.chest_pain_c')}}</label>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="chest_pain_last_less_five" name="chest_pain_last" value="less_five_minute">
                                                        <label for="chest_pain_last_less_five">
                                                            < 5 Minutes </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="chest_pain_last_five_ten" name="chest_pain_last" value="five_ten_minute">
                                                        <label for="chest_pain_last_five_ten">
                                                            5 - 10 Minutes
                                                        </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="chest_pain_last_greter_ten" name="chest_pain_last" value="greter_ten_minute">
                                                        <label for="chest_pain_last_greter_ten">
                                                            > 10 Minutes
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="chest_pain_d" class="col-form-label">{{ __('form.question.chest_pain_d') }}</label>
                                                        <input id="chest_pain_d" type="text" name="chest_pain_d" value="{{ old('chest_pain_d') }}" class="form-control @error('chest_pain_d') is-invalid @enderror">
                                                        @error('chest_pain_d')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="chest_pain_e" class="col-form-label">{{ __('form.question.chest_pain_e') }}</label>
                                                        <input id="chest_pain_e" type="text" name="chest_pain_e" value="{{ old('chest_pain_e') }}" class="form-control @error('chest_pain_e') is-invalid @enderror">
                                                        @error('chest_pain_e')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="chest_pain_f" class="col-form-label">{{ __('form.question.chest_pain_f') }}</label>
                                                        <input id="chest_pain_f" type="text" name="chest_pain_f" value="{{ old('chest_pain_f') }}" class="form-control @error('chest_pain_f') is-invalid @enderror">
                                                        @error('chest_pain_f')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="chest_pain_g" class="col-form-label">{{ __('form.question.chest_pain_g') }}</label>
                                                        <input id="chest_pain_g" type="text" name="chest_pain_g" value="{{ old('chest_pain_g') }}" class="form-control @error('chest_pain_g') is-invalid @enderror">
                                                        @error('chest_pain_g')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="tightness" class="col-sm-3 col-form-label">{{ __('form.question.tightness') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="tightness_yes" name="tightness" value="1">
                                                <label for="tightness_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="tightness_no" name="tightness" value="0" checked>
                                                <label for="tightness_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.tightness') }} </span>
                                            <!-- <input id="tightness" type="text" name="tightness" value="{{ old('tightness') }}" class="form-control @error('tightness') is-invalid @enderror" placeholder="{{ __('form.placeholder.tightness') }}"> -->
                                            @error('tightness')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="pulpitations" class="col-sm-3 col-form-label">{{ __('form.question.pulpitations') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="pulpitations_yes" name="pulpitations" value="1">
                                                <label for="pulpitations_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="pulpitations_no" name="pulpitations" value="0" checked>
                                                <label for="pulpitations_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.pulpitations') }} </span>

                                            <!-- <input id="pulpitations" type="text" name="pulpitations" value="{{ old('pulpitations') }}" class="form-control @error('pulpitations') is-invalid @enderror" placeholder="{{ __('form.placeholder.pulpitations') }}"> -->
                                            @error('pulpitations')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="shortness_of_breath" class="col-sm-3 col-form-label">{{ __('form.question.shortness_of_breath') }}</label>
                                        <div class="col-sm-9 full_question">

                                        <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="shortness_of_breath_yes" name="shortness_of_breath" value="1">
                                                <label for="shortness_of_breath_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button" id="shortness_of_breath_no" name="shortness_of_breath" value="0" checked>
                                                <label for="shortness_of_breath_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.shortness_of_breath') }} </span>

                                            <!-- <input id="shortness_of_breath" type="text" name="shortness_of_breath" value="{{ old('shortness_of_breath') }}" class="form-control @error('shortness_of_breath') is-invalid @enderror" placeholder="{{ __('form.placeholder.shortness_of_breath') }}"> -->
                                            @error('shortness_of_breath')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <div class="show_if_yes hide">
                                                <div class="sub_questions">
                                                    <label class="sub_question_label">{{ __('form.question.shortness_of_breath_a')}}</label>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="all_time_sob" name="feel_sob" value="all_time">
                                                        <label for="all_time_sob">
                                                            All The Time
                                                        </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="some_time" name="feel_sob" value="some_time">
                                                        <label for="some_time">
                                                            Sometimes only
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="shortness_of_breath_b" class="col-form-label">{{ __('form.question.shortness_of_breath_b') }}</label>
                                                        <input id="shortness_of_breath_b" type="text" name="shortness_of_breath_b" value="{{ old('shortness_of_breath_b') }}" class="form-control @error('shortness_of_breath_b') is-invalid @enderror">
                                                        @error('shortness_of_breath_b')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="shortness_of_breath_c" class="col-form-label">{{ __('form.question.shortness_of_breath_c') }}</label>
                                                        <input id="shortness_of_breath_c" type="text" name="shortness_of_breath_c" value="{{ old('shortness_of_breath_c') }}" class="form-control @error('shortness_of_breath_c') is-invalid @enderror">
                                                        @error('shortness_of_breath_c')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="shortness_of_breath_d" class="col-form-label">{{ __('form.question.shortness_of_breath_d') }}</label>
                                                        <input id="shortness_of_breath_d" type="text" name="shortness_of_breath_d" value="{{ old('shortness_of_breath_d') }}" class="form-control @error('shortness_of_breath_d') is-invalid @enderror">
                                                        @error('shortness_of_breath_d')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="shortness_of_breath_e" class="col-form-label">{{ __('form.question.shortness_of_breath_e') }}</label>
                                                        <input id="shortness_of_breath_e" type="text" name="shortness_of_breath_e" value="{{ old('shortness_of_breath_e') }}" class="form-control @error('shortness_of_breath_e') is-invalid @enderror" placeholder="{{__('form.placeholder.shortness_of_breath_other')}}">
                                                        @error('shortness_of_breath_e')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="orthopnea" class="col-sm-3 col-form-label">{{ __('form.question.orthopnea') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="orthopnea_yes" name="orthopnea" value="1">
                                                <label for="orthopnea_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="orthopnea_no" name="orthopnea" value="0" checked>
                                                <label for="orthopnea_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.orthopnea') }} </span>

                                            <!-- <input id="orthopnea" type="text" name="orthopnea" value="{{ old('orthopnea') }}" class="form-control @error('orthopnea') is-invalid @enderror" placeholder="{{ __('form.placeholder.orthopnea') }}"> -->
                                            @error('orthopnea')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="pnd" class="col-sm-3 col-form-label">{{ __('form.question.pnd') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="pnd_yes" name="pnd" value="1">
                                                <label for="pnd_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="pnd_no" name="pnd" value="0" checked>
                                                <label for="pnd_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.pnd') }} </span>
                                            <!-- <input id="pnd" type="text" name="pnd" value="{{ old('pnd') }}" class="form-control @error('pnd') is-invalid @enderror" placeholder="{{ __('form.placeholder.pnd') }}"> -->
                                            @error('pnd')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="swelling_of_ankles" class="col-sm-3 col-form-label">{{ __('form.question.swelling_of_ankles') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="swelling_of_ankles_yes" name="swelling_of_ankles" value="1">
                                                <label for="swelling_of_ankles_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="swelling_of_ankles_no" name="swelling_of_ankles" value="0" checked>
                                                <label for="swelling_of_ankles_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.swelling_of_ankles') }} </span>
                                            <!-- <input id="swelling_of_ankles" type="text" name="swelling_of_ankles" value="{{ old('swelling_of_ankles') }}" class="form-control @error('swelling_of_ankles') is-invalid @enderror" placeholder="{{ __('form.placeholder.swelling_of_ankles') }}"> -->
                                            @error('swelling_of_ankles')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="coughing" class="col-sm-3 col-form-label">{{ __('form.question.coughing') }}</label>
                                        <div class="col-sm-9 full_question">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="coughing_yes" name="coughing" value="1">
                                                <label for="coughing_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="coughing_no" name="coughing" value="0" checked>
                                                <label for="coughing_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.coughing') }} </span>

                                            <div class="show_if_yes hide">
                                                <div class="sub_questions">
                                                    <label class="sub_question_label">{{ __('form.question.coughing_a')}}</label>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="cough_all_time" name="coughing_time" value="all_time">
                                                        <label for="cough_all_time">
                                                            All The Time
                                                        </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" class="radio_button"  id="cough_some_time" name="coughing_time" value="some_time">
                                                        <label for="cough_some_time">
                                                            Sometimes only
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <input id="coughing" type="text" name="coughing" value="{{ old('coughing') }}" class="form-control @error('coughing') is-invalid @enderror" placeholder="{{ __('form.placeholder.coughing') }}"> -->
                                            @error('coughing')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="wheezing" class="col-sm-3 col-form-label">{{ __('form.question.wheezing') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="wheezing_yes" name="wheezing" value="1">
                                                <label for="wheezing_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="wheezing_no" name="wheezing" value="0" checked>
                                                <label for="wheezing_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.wheezing') }} </span>
                                            <!-- <input id="wheezing" type="text" name="wheezing" value="{{ old('wheezing') }}" class="form-control @error('wheezing') is-invalid @enderror" placeholder="{{ __('form.placeholder.wheezing') }}"> -->
                                            @error('wheezing')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="sputum" class="col-sm-3 col-form-label">{{ __('form.question.sputum') }}</label>
                                        <div class="col-sm-9">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="sputum_yes" name="sputum" value="1">
                                                <label for="sputum_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="sputum_no" name="sputum" value="0" checked>
                                                <label for="sputum_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.sputum') }} </span>

                                            <!-- <input id="sputum" type="text" name="sputum" value="{{ old('sputum') }}" class="form-control @error('sputum') is-invalid @enderror" placeholder="{{ __('form.placeholder.sputum') }}"> -->
                                            @error('sputum')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="dizziness" class="col-sm-3 col-form-label">{{ __('form.question.dizziness') }}</label>
                                        <div class="col-sm-9">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="dizziness_yes" name="dizziness" value="1">
                                                <label for="dizziness_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="dizziness_no" name="dizziness" value="0" checked>
                                                <label for="dizziness_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.dizziness') }} </span>

                                            <!-- <input id="dizziness" type="text" name="dizziness" value="{{ old('dizziness') }}" class="form-control @error('dizziness') is-invalid @enderror" placeholder="{{ __('form.placeholder.dizziness') }}"> -->
                                            @error('dizziness')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="presyncope" class="col-sm-3 col-form-label">{{ __('form.question.presyncope') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="presyncope_yes" name="presyncope" value="1">
                                                <label for="presyncope_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="presyncope_no" name="presyncope" value="0" checked>
                                                <label for="presyncope_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.presyncope') }} </span>
                                            <!-- <input id="presyncope" type="text" name="presyncope" value="{{ old('presyncope') }}" class="form-control @error('presyncope') is-invalid @enderror" placeholder="{{ __('form.placeholder.presyncope') }}"> -->
                                            @error('presyncope')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="tiredness" class="col-sm-3 col-form-label">{{ __('form.question.tiredness') }}</label>
                                        <div class="col-sm-9">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="tiredness_yes" name="tiredness" value="1">
                                                <label for="tiredness_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="tiredness_no" name="tiredness" value="0" checked>
                                                <label for="tiredness_no">
                                                    No
                                                </label>
                                            </div>
                                            <span> {{ __('form.placeholder.tiredness') }} </span>
                                            <!-- <input id="tiredness" type="text" name="tiredness" value="{{ old('tiredness') }}" class="form-control @error('tiredness') is-invalid @enderror" placeholder="{{ __('form.placeholder.tiredness') }}"> -->
                                            @error('tiredness')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="exercise" class="col-sm-3 col-form-label">{{ __('form.question.exercise') }}</label>
                                        <div class="col-sm-9 full_question">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="exercise_yes" name="exercise" value="1">
                                                <label for="exercise_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="exercise_no" name="exercise" value="0" checked>
                                                <label for="exercise_no">
                                                    No
                                                </label>
                                            </div>
                                            
                                            @error('exercise')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <span> {{ __('form.placeholder.exercise') }} </span>

                                            <div class="show_if_yes hide">
                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="exercise_a" class="col-form-label">{{ __('form.question.exercise_a') }}</label>
                                                        <input id="exercise_a" type="text" name="exercise_a" value="{{ old('exercise_a') }}" class="form-control @error('exercise_a') is-invalid @enderror">
                                                        @error('exercise_a')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="exercise_b" class="col-form-label">{{ __('form.question.exercise_b') }}</label>
                                                        <input id="exercise_b" type="text" name="exercise_b" value="{{ old('exercise_b') }}" class="form-control @error('exercise_b') is-invalid @enderror">
                                                        @error('exercise_b')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="other_symptoms" class="col-sm-3 col-form-label">{{ __('form.question.other_symptoms') }}</label>
                                        <div class="col-sm-9">
                                            <input id="other_symptoms" type="text" name="other_symptoms" value="{{ old('other_symptoms') }}" class="form-control @error('other_symptoms') is-invalid @enderror" placeholder="{{ __('form.placeholder.other_symptoms') }}">
                                            @error('other_symptoms')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="central_nervous_system" class="col-sm-3 col-form-label">{{ __('form.question.central_nervous_system') }}</label>
                                        <div class="col-sm-9">
                                            <input id="central_nervous_system" type="text" name="central_nervous_system" value="{{ old('central_nervous_system') }}" class="form-control @error('central_nervous_system') is-invalid @enderror" placeholder="{{ __('form.placeholder.central_nervous_system') }}">
                                            @error('central_nervous_system')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="musculoskeletal" class="col-sm-3 col-form-label">{{ __('form.question.musculoskeletal') }}</label>
                                        <div class="col-sm-9">
                                            <input id="musculoskeletal" type="text" name="musculoskeletal" value="{{ old('musculoskeletal') }}" class="form-control @error('musculoskeletal') is-invalid @enderror" placeholder="{{ __('form.placeholder.musculoskeletal') }}">
                                            @error('musculoskeletal')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="gastrointestinal" class="col-sm-3 col-form-label">{{ __('form.question.gastrointestinal') }}</label>
                                        <div class="col-sm-9">
                                            <input id="gastrointestinal" type="text" name="gastrointestinal" value="{{ old('gastrointestinal') }}" class="form-control @error('gastrointestinal') is-invalid @enderror" placeholder="{{ __('form.placeholder.gastrointestinal') }}">
                                            @error('gastrointestinal')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="urogenital_symptoms" class="col-sm-3 col-form-label">{{ __('form.question.urogenital_symptoms') }}</label>
                                        <div class="col-sm-9">
                                            <input id="urogenital_symptoms" type="text" name="urogenital_symptoms" value="{{ old('urogenital_symptoms') }}" class="form-control @error('urogenital_symptoms') is-invalid @enderror" placeholder="{{ __('form.placeholder.urogenital_symptoms') }}">
                                            @error('urogenital_symptoms')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="skin" class="col-sm-3 col-form-label">{{ __('form.question.skin') }}</label>
                                        <div class="col-sm-9">
                                            <input id="skin" type="text" name="skin" value="{{ old('skin') }}" class="form-control @error('skin') is-invalid @enderror" placeholder="{{ __('form.placeholder.skin') }}">
                                            @error('skin')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="gynae" class="col-sm-3 col-form-label">{{ __('form.question.gynae') }}</label>
                                        <div class="col-sm-9">
                                            <input id="gynae" type="text" name="gynae" value="{{ old('gynae') }}" class="form-control @error('gynae') is-invalid @enderror" placeholder="{{ __('form.placeholder.gynae') }}">
                                            @error('gynae')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="medications" class="col-sm-3 col-form-label">{{ __('form.question.medications') }}</label>
                                        <div class="col-sm-9 full_question">

                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="medications_yes" name="medications" value="1">
                                                <label for="medications_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" class="radio_button"  id="medications_no" name="medications" value="0" checked>
                                                <label for="medications_no">
                                                    No
                                                </label>
                                            </div>
                                            
                                            @error('medications')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <span> {{ __('form.placeholder.medications') }} </span>


                                            <div class="show_if_yes hide">
                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="medications_a" class="col-form-label">{{ __('form.question.medications_a') }}</label>
                                                        <input id="medications_a" type="text" name="medications_a" value="{{ old('medications_a') }}" class="form-control @error('medications_a') is-invalid @enderror">
                                                        @error('medications_a')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="medications_b" class="col-form-label">{{ __('form.question.medications_b') }}</label>
                                                        <input id="medications_b" type="text" name="medications_b" value="{{ old('medications_b') }}" class="form-control @error('medications_b') is-invalid @enderror">
                                                        @error('medications_b')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="medications_c" class="col-form-label">{{ __('form.question.medications_c') }}</label>
                                                        <input id="medications_c" type="text" name="medications_c" value="{{ old('medications_c') }}" class="form-control @error('medications_c') is-invalid @enderror">
                                                        @error('medications_c')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="medications_d" class="col-form-label">{{ __('form.question.medications_d') }}</label>
                                                        <input id="medications_d" type="text" name="medications_d" value="{{ old('medications_d') }}" class="form-control @error('medications_d') is-invalid @enderror">
                                                        @error('medications_d')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="medications_e" class="col-form-label">{{ __('form.question.medications_e') }}</label>
                                                        <input id="medications_e" type="text" name="medications_e" value="{{ old('medications_e') }}" class="form-control @error('medications_e') is-invalid @enderror">
                                                        @error('medications_e')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="sub_questions">
                                                    <div class="col-sm-12">
                                                        <label for="medications_f" class="col-form-label">{{ __('form.question.medications_f') }}</label>
                                                        <input id="medications_f" type="text" name="medications_f" value="{{ old('medications_f') }}" class="form-control @error('medications_f') is-invalid @enderror">
                                                        @error('medications_f')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="drug_allergies" class="col-sm-3 col-form-label">{{ __('form.question.drug_allergies') }}</label>
                                        <div class="col-sm-9">
                                            <input id="drug_allergies" type="text" name="drug_allergies" value="{{ old('drug_allergies') }}" class="form-control @error('drug_allergies') is-invalid @enderror" placeholder="{{ __('form.placeholder.drug_allergies') }}">
                                            @error('drug_allergies')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="updates" class="col-sm-3 col-form-label">{{ __('form.question.updates') }}</label>
                                        <div class="col-sm-9">
                                            <input id="updates" type="text" name="updates" value="{{ old('updates') }}" class="form-control @error('updates') is-invalid @enderror" placeholder="{{ __('form.placeholder.updates') }}">
                                            @error('updates')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group row required">
                                        <label for="risk_factors" class="col-sm-3 col-form-label">{{ __('form.question.risk_factors') }}</label>
                                        <div class="col-sm-9">
                                            <span>{{ __('form.placeholder.risk_factors') }}</span>
                                            <div class="sub_questions">
                                                <label class="sub_question_label">{{ __('form.question.risk_factors_a')}}</label>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" class="radio_button"  id="risk_factors_a_yes" name="risk_factors_a" value="yes">
                                                    <label for="risk_factors_a_yes">
                                                        Yes
                                                    </label>
                                                </div>

                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" class="radio_button"  id="risk_factors_a_no" name="risk_factors_a" value="no" checked>
                                                    <label for="risk_factors_a_no">
                                                        No
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="sub_questions">
                                                <label class="sub_question_label">{{ __('form.question.risk_factors_b')}}</label>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" class="radio_button"  id="risk_factors_b_yes" name="risk_factors_b" value="yes">
                                                    <label for="risk_factors_b_yes">
                                                        Yes
                                                    </label>
                                                </div>

                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" class="radio_button"  id="risk_factors_b_no" name="risk_factors_b" value="no" checked>
                                                    <label for="risk_factors_b_no">
                                                        No
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="sub_questions">
                                                <div class="col-sm-12">
                                                    <label for="risk_factors_c" class="col-form-label">{{ __('form.question.risk_factors_c') }}</label>
                                                    <input id="risk_factors_c" type="text" name="risk_factors_c" value="{{ old('risk_factors_c') }}" class="form-control @error('risk_factors_c') is-invalid @enderror">
                                                    @error('risk_factors_c')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-9">                            
                                            <input id="risk_factors" type="text" name="risk_factors" value="{{ old('risk_factors') }}" class="form-control @error('risk_factors') is-invalid @enderror">
                                            @error('risk_factors')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div> -->

                                    </div>


                                    <div class="form-group row required">
                                        <label for="family_history" class="col-sm-3 col-form-label">{{ __('form.question.family_history') }}</label>
                                        <div class="col-sm-9">
                                            <input id="family_history" type="text" name="family_history" value="{{ old('family_history') }}" class="form-control @error('family_history') is-invalid @enderror" placeholder="{{ __('form.placeholder.family_history') }}">
                                            @error('family_history')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row required">
                                        <label for="interventions" class="col-sm-3 col-form-label">{{ __('form.question.interventions') }}</label>
                                        <div class="col-sm-9">
                                            <input id="interventions" type="text" name="interventions" value="{{ old('interventions') }}" class="form-control @error('interventions') is-invalid @enderror" placeholder="{{ __('form.placeholder.interventions') }}">
                                            @error('interventions')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row required">
                                        <label for="new_tests" class="col-sm-3 col-form-label">{{ __('form.question.new_tests') }}</label>
                                        <div class="col-sm-9">
                                            <input id="new_tests" type="text" name="new_tests" value="{{ old('new_tests') }}" class="form-control @error('new_tests') is-invalid @enderror" placeholder="{{ __('form.placeholder.new_tests') }}">
                                            @error('new_tests')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" id="addBtn" class="btn btn-success float-right"><i class="fas fa-plus"></i> Submit</button>
                                    <span class="float-right">&nbsp;&nbsp;&nbsp;</span>
                                    <a type="button" class="btn btn-default float-right" href="{{ route('backend.patient.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
                                </div>

                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('partials.backend.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection


@section('bodyClass', 'hold-transition sidebar-mini pace-primary')

@section('styles')
@endsection

@section('scripts')
<script src="{{ asset('js/backend/form/create.js') }}"></script>
@endsection