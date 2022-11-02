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
                        <h1>Patient’s assessment form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.assessmentform.index') }}">Patient’s assessment form</a></li>
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
                        <form action="{{ route('backend.assessmentform.store') }}" method="POST" id="addForm" enctype="multipart/form-data">
                            @csrf
                            <!-- Default box -->
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Add Patient’s assessment form</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>



                                <div class="card-body">

                                    <div class="form-group row required">
                                        <label for="blood_sample" class="col-sm-3 col-form-label">{{ __('assessmentform.question.blood_sample') }}</label>
                                        <div class="col-sm-9">
                                            <input id="blood_sample" type="text" name="blood_sample" value="{{ old('blood_sample') }}" class="form-control @error('blood_sample') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.blood_sample') }}">
                                            @error('blood_sample')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="ecg" class="col-sm-3 col-form-label">{{ __('assessmentform.question.ecg') }}</label>
                                        <div class="col-sm-9">
                                            <input id="ecg" type="text" name="ecg" value="{{ old('ecg') }}" class="form-control @error('ecg') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.ecg') }}">
                                            @error('ecg')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="echocardiogram" class="col-sm-3 col-form-label">{{ __('assessmentform.question.echocardiogram') }}</label>
                                        <div class="col-sm-9">
                                            <input id="echocardiogram" type="text" name="echocardiogram" value="{{ old('echocardiogram') }}" class="form-control @error('echocardiogram') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.echocardiogram') }}">
                                            @error('echocardiogram')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="cmr" class="col-sm-3 col-form-label">{{ __('assessmentform.question.cmr') }}</label>
                                        <div class="col-sm-9">
                                            <input id="cmr" type="text" name="cmr" value="{{ old('cmr') }}" class="form-control @error('cmr') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.cmr') }}">
                                            @error('cmr')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="holt" class="col-sm-3 col-form-label">{{ __('assessmentform.question.holt') }}</label>
                                        <div class="col-sm-9">
                                            <input id="holt" type="text" name="holt" value="{{ old('holt') }}" class="form-control @error('holt') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.holt') }}">
                                            @error('holt')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="pacemaker" class="col-sm-3 col-form-label">{{ __('assessmentform.question.pacemaker') }}</label>
                                        <div class="col-sm-9">
                                            <input id="pacemaker" type="text" name="pacemaker" value="{{ old('pacemaker') }}" class="form-control @error('pacemaker') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.pacemaker') }}">
                                            @error('pacemaker')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="ett" class="col-sm-3 col-form-label">{{ __('assessmentform.question.ett') }}</label>
                                        <div class="col-sm-9">
                                            <input id="ett" type="text" name="ett" value="{{ old('ett') }}" class="form-control @error('ett') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.ett') }}">
                                            @error('ett')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="computed_tomography" class="col-sm-3 col-form-label">{{ __('assessmentform.question.computed_tomography') }}</label>
                                        <div class="col-sm-9">
                                            <input id="computed_tomography" type="text" name="computed_tomography" value="{{ old('computed_tomography') }}" class="form-control @error('computed_tomography') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.computed_tomography') }}">
                                            @error('computed_tomography')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="other" class="col-sm-3 col-form-label">{{ __('assessmentform.question.other') }}</label>
                                        <div class="col-sm-9">
                                            <input id="other" type="text" name="other" value="{{ old('other') }}" class="form-control @error('other') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.other') }}">
                                            @error('other')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="on_examination" class="col-sm-3 col-form-label">{{ __('assessmentform.question.on_examination') }}</label>
                                        <div class="col-sm-9">
                                            <input id="on_examination" type="text" name="on_examination" value="{{ old('on_examination') }}" class="form-control @error('on_examination') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.on_examination') }}">
                                            @error('on_examination')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="blood_pressure" class="col-sm-3 col-form-label">{{ __('assessmentform.question.blood_pressure') }}</label>
                                        <div class="col-sm-9">
                                            <input id="blood_pressure" type="text" name="blood_pressure" value="{{ old('blood_pressure') }}" class="form-control @error('blood_pressure') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.blood_pressure') }}">
                                            @error('blood_pressure')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="heart_rate" class="col-sm-3 col-form-label">{{ __('assessmentform.question.heart_rate') }}</label>
                                        <div class="col-sm-9">
                                            <input id="heart_rate" type="text" name="heart_rate" value="{{ old('heart_rate') }}" class="form-control @error('heart_rate') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.heart_rate') }}">
                                            @error('heart_rate')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="weight" class="col-sm-3 col-form-label">{{ __('assessmentform.question.weight') }}</label>
                                        <div class="col-sm-9">
                                            <input id="weight" type="text" name="weight" value="{{ old('weight') }}" class="form-control @error('weight') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.weight') }}">
                                            @error('weight')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="plans" class="col-sm-3 col-form-label">{{ __('assessmentform.question.plans') }}</label>
                                        <div class="col-sm-9">
                                            <input id="plans" type="text" name="plans" value="{{ old('plans') }}" class="form-control @error('plans') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.plans') }}">
                                            @error('plans')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="nota_bene" class="col-sm-3 col-form-label">{{ __('assessmentform.question.nota_bene') }}</label>
                                        <div class="col-sm-9">
                                            <input id="nota_bene" type="text" name="nota_bene" value="{{ old('nota_bene') }}" class="form-control @error('nota_bene') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.nota_bene') }}">
                                            @error('nota_bene')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="ask_about" class="col-sm-3 col-form-label">{{ __('assessmentform.question.ask_about') }}</label>
                                        <div class="col-sm-9">
                                            <input id="ask_about" type="text" name="ask_about" value="{{ old('ask_about') }}" class="form-control @error('ask_about') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.ask_about') }}">
                                            @error('ask_about')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="main_diagnosis" class="col-sm-3 col-form-label">{{ __('assessmentform.question.main_diagnosis') }}</label>
                                        <div class="col-sm-9">
                                            <input id="main_diagnosis" type="text" name="main_diagnosis" value="{{ old('main_diagnosis') }}" class="form-control @error('main_diagnosis') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.main_diagnosis') }}">
                                            @error('main_diagnosis')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="md_tests" class="col-sm-3 col-form-label">{{ __('assessmentform.question.md_tests') }}</label>
                                        <div class="col-sm-9">
                                            <input id="md_tests" type="text" name="md_tests" value="{{ old('md_tests') }}" class="form-control @error('md_tests') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.md_tests') }}">
                                            @error('md_tests')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="md_treatment" class="col-sm-3 col-form-label">{{ __('assessmentform.question.md_treatment') }}</label>
                                        <div class="col-sm-9">
                                            <input id="md_treatment" type="text" name="md_treatment" value="{{ old('md_treatment') }}" class="form-control @error('md_treatment') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.md_treatment') }}">
                                            @error('md_treatment')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="risk_strat" class="col-sm-3 col-form-label">{{ __('assessmentform.question.risk_strat') }}</label>
                                        <div class="col-sm-9">
                                            <input id="risk_strat" type="text" name="risk_strat" value="{{ old('risk_strat') }}" class="form-control @error('risk_strat') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.risk_strat') }}">
                                            @error('risk_strat')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="driving_dvla" class="col-sm-3 col-form-label">{{ __('assessmentform.question.driving_dvla') }}</label>
                                        <div class="col-sm-9">
                                            <input id="driving_dvla" type="text" name="driving_dvla" value="{{ old('driving_dvla') }}" class="form-control @error('driving_dvla') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.driving_dvla') }}">
                                            @error('driving_dvla')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="anticoagulation" class="col-sm-3 col-form-label">{{ __('assessmentform.question.anticoagulation') }}</label>
                                        <div class="col-sm-9">
                                            <input id="anticoagulation" type="text" name="anticoagulation" value="{{ old('anticoagulation') }}" class="form-control @error('anticoagulation') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.anticoagulation') }}">
                                            @error('anticoagulation')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="has_bled_score" class="col-sm-3 col-form-label">{{ __('assessmentform.question.has_bled_score') }}</label>
                                        <div class="col-sm-9">
                                            <input id="has_bled_score" type="text" name="has_bled_score" value="{{ old('has_bled_score') }}" class="form-control @error('has_bled_score') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.has_bled_score') }}">
                                            @error('has_bled_score')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="icd" class="col-sm-3 col-form-label">{{ __('assessmentform.question.icd') }}</label>
                                        <div class="col-sm-9">
                                            <input id="icd" type="text" name="icd" value="{{ old('icd') }}" class="form-control @error('icd') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.icd') }}">
                                            @error('icd')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="discharge" class="col-sm-3 col-form-label">{{ __('assessmentform.question.discharge') }}</label>
                                        <div class="col-sm-9">
                                            <input id="discharge" type="text" name="discharge" value="{{ old('discharge') }}" class="form-control @error('discharge') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.discharge') }}">
                                            @error('discharge')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="date_of_next_follow_up" class="col-sm-3 col-form-label">{{ __('assessmentform.question.date_of_next_follow_up') }}</label>
                                        <div class="col-sm-9">
                                            <div class="input-group date"  data-target-input="nearest">
                                                <input type="text" id="date_of_next_follow_up" name="date_of_next_follow_up" class="form-control datetimepicker-input" data-target="#date_of_next_follow_up" value="{{ old('date_of_next_follow_up') }}" class="form-control @error('date_of_next_follow_up') is-invalid @enderror" placeholder="{{ __('assessmentform.date_of_next_follow_up.genetics') }}"/>
                                                <div class="input-group-append" data-target="#date_of_next_follow_up" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>                            
                                            @error('date_of_next_follow_up')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="genetics" class="col-sm-3 col-form-label">{{ __('assessmentform.question.genetics') }}</label>
                                        <div class="col-sm-9">
                                            <input id="genetics" type="text" name="genetics" value="{{ old('genetics') }}" class="form-control @error('genetics') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.genetics') }}">
                                            @error('genetics')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="bp_recorder" class="col-sm-3 col-form-label">{{ __('assessmentform.question.bp_recorder') }}</label>
                                        <div class="col-sm-9">
                                            <input id="bp_recorder" type="text" name="bp_recorder" value="{{ old('bp_recorder') }}" class="form-control @error('bp_recorder') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.bp_recorder') }}">
                                            @error('bp_recorder')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="lipid" class="col-sm-3 col-form-label">{{ __('assessmentform.question.lipid') }}</label>
                                        <div class="col-sm-9">
                                            <input id="lipid" type="text" name="lipid" value="{{ old('lipid') }}" class="form-control @error('lipid') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.lipid') }}">
                                            @error('lipid')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="family_screening" class="col-sm-3 col-form-label">{{ __('assessmentform.question.family_screening') }}</label>
                                        <div class="col-sm-9">
                                            <input id="family_screening" type="text" name="family_screening" value="{{ old('family_screening') }}" class="form-control @error('family_screening') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.family_screening') }}">
                                            @error('family_screening')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="chase" class="col-sm-3 col-form-label">{{ __('assessmentform.question.chase') }}</label>
                                        <div class="col-sm-9">
                                            <input id="chase" type="text" name="chase" value="{{ old('chase') }}" class="form-control @error('chase') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.chase') }}">
                                            @error('chase')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="diagnosis_other" class="col-sm-3 col-form-label">{{ __('assessmentform.question.diagnosis_other') }}</label>
                                        <div class="col-sm-9">
                                            <input id="diagnosis_other" type="text" name="diagnosis_other" value="{{ old('diagnosis_other') }}" class="form-control @error('diagnosis_other') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.diagnosis_other') }}">
                                            @error('diagnosis_other')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="covid" class="col-sm-3 col-form-label">{{ __('assessmentform.question.covid') }}</label>
                                        <div class="col-sm-9">
                                            <input id="covid" type="text" name="covid" value="{{ old('covid') }}" class="form-control @error('covid') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.covid') }}">
                                            @error('covid')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="dental_check" class="col-sm-3 col-form-label">{{ __('assessmentform.question.dental_check') }}</label>
                                        <div class="col-sm-9">
                                            <input id="dental_check" type="text" name="dental_check" value="{{ old('dental_check') }}" class="form-control @error('dental_check') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.dental_check') }}">
                                            @error('dental_check')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="exercise" class="col-sm-3 col-form-label">{{ __('assessmentform.question.exercise') }}</label>
                                        <div class="col-sm-9">
                                            <input id="exercise" type="text" name="exercise" value="{{ old('exercise') }}" class="form-control @error('exercise') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.exercise') }}">
                                            @error('exercise')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="alcohol_smoking" class="col-sm-3 col-form-label">{{ __('assessmentform.question.alcohol_smoking') }}</label>
                                        <div class="col-sm-9">
                                            <input id="alcohol_smoking" type="text" name="alcohol_smoking" value="{{ old('alcohol_smoking') }}" class="form-control @error('alcohol_smoking') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.alcohol_smoking') }}">
                                            @error('alcohol_smoking')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="dtf" class="col-sm-3 col-form-label">{{ __('assessmentform.question.dtf') }}</label>
                                        <div class="col-sm-9">
                                            <input id="dtf" type="text" name="dtf" value="{{ old('dtf') }}" class="form-control @error('dtf') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.dtf') }}">
                                            @error('dtf')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="dt" class="col-sm-3 col-form-label">{{ __('assessmentform.question.dt') }}</label>
                                        <div class="col-sm-9">
                                            <input id="dt" type="text" name="dt" value="{{ old('dt') }}" class="form-control @error('dt') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.dt') }}">
                                            @error('dt')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="stop_ace_arb" class="col-sm-3 col-form-label">{{ __('assessmentform.question.stop_ace_arb') }}</label>
                                        <div class="col-sm-9">
                                            <input id="stop_ace_arb" type="text" name="stop_ace_arb" value="{{ old('stop_ace_arb') }}" class="form-control @error('stop_ace_arb') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.stop_ace_arb') }}">
                                            @error('stop_ace_arb')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="stop_meds" class="col-sm-3 col-form-label">{{ __('assessmentform.question.stop_meds') }}</label>
                                        <div class="col-sm-9">
                                            <input id="stop_meds" type="text" name="stop_meds" value="{{ old('stop_meds') }}" class="form-control @error('stop_meds') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.stop_meds') }}">
                                            @error('stop_meds')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="ocp_card_preg_service" class="col-sm-3 col-form-label">{{ __('assessmentform.question.ocp_card_preg_service') }}</label>
                                        <div class="col-sm-9">
                                            <input id="ocp_card_preg_service" type="text" name="ocp_card_preg_service" value="{{ old('ocp_card_preg_service') }}" class="form-control @error('ocp_card_preg_service') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.ocp_card_preg_service') }}">
                                            @error('ocp_card_preg_service')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="cmuk" class="col-sm-3 col-form-label">{{ __('assessmentform.question.cmuk') }}</label>
                                        <div class="col-sm-9">
                                            <input id="cmuk" type="text" name="cmuk" value="{{ old('cmuk') }}" class="form-control @error('cmuk') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.cmuk') }}">
                                            @error('cmuk')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="bhf" class="col-sm-3 col-form-label">{{ __('assessmentform.question.bhf') }}</label>
                                        <div class="col-sm-9">
                                            <input id="bhf" type="text" name="bhf" value="{{ old('bhf') }}" class="form-control @error('bhf') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.bhf') }}">
                                            @error('bhf')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="red_flags" class="col-sm-3 col-form-label">{{ __('assessmentform.question.red_flags') }}</label>
                                        <div class="col-sm-9">
                                            <input id="red_flags" type="text" name="red_flags" value="{{ old('red_flags') }}" class="form-control @error('red_flags') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.red_flags') }}">
                                            @error('red_flags')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="follow_up_mention" class="col-sm-3 col-form-label">{{ __('assessmentform.question.follow_up_mention') }}</label>
                                        <div class="col-sm-9">
                                            <input id="follow_up_mention" type="text" name="follow_up_mention" value="{{ old('follow_up_mention') }}" class="form-control @error('follow_up_mention') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.follow_up_mention') }}">
                                            @error('follow_up_mention')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="call_after_tests" class="col-sm-3 col-form-label">{{ __('assessmentform.question.call_after_tests') }}</label>
                                        <div class="col-sm-9">
                                            <input id="call_after_tests" type="text" name="call_after_tests" value="{{ old('call_after_tests') }}" class="form-control @error('call_after_tests') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.call_after_tests') }}">
                                            @error('call_after_tests')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="time_of_follow_up" class="col-sm-3 col-form-label">{{ __('assessmentform.question.time_of_follow_up') }}</label>
                                        <div class="col-sm-9">
                                            <input id="time_of_follow_up" type="text" name="time_of_follow_up" value="{{ old('time_of_follow_up') }}" class="form-control @error('time_of_follow_up') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.time_of_follow_up') }}">
                                            @error('time_of_follow_up')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="follow_up_mdt" class="col-sm-3 col-form-label">{{ __('assessmentform.question.follow_up_mdt') }}</label>
                                        <div class="col-sm-9">
                                            <input id="follow_up_mdt" type="text" name="follow_up_mdt" value="{{ old('follow_up_mdt') }}" class="form-control @error('follow_up_mdt') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.follow_up_mdt') }}">
                                            @error('follow_up_mdt')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="follow_up_cc" class="col-sm-3 col-form-label">{{ __('assessmentform.question.follow_up_cc') }}</label>
                                        <div class="col-sm-9">
                                            <input id="follow_up_cc" type="text" name="follow_up_cc" value="{{ old('follow_up_cc') }}" class="form-control @error('follow_up_cc') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.follow_up_cc') }}">
                                            @error('follow_up_cc')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row required">
                                        <label for="follow_up_red_flags" class="col-sm-3 col-form-label">{{ __('assessmentform.question.follow_up_red_flags') }}</label>
                                        <div class="col-sm-9">
                                            <input id="follow_up_red_flags" type="text" name="follow_up_red_flags" value="{{ old('follow_up_red_flags') }}" class="form-control @error('follow_up_red_flags') is-invalid @enderror" placeholder="{{ __('assessmentform.placeholder.follow_up_red_flags') }}">
                                            @error('follow_up_red_flags')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a type="button" class="btn btn-default" href="{{ route('backend.assessmentform.index') }}"><i class="fas fa-times-circle"></i> Cancel</a>
                                    <button type="submit" id="addBtn" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add</button>
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
<script src="{{ asset('js/backend/assessmentform/create.js') }}"></script>
@endsection