@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Create a form</h2>

        <form method="POST" action="{{ route('form.store') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $name) }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="business_name" class="col-md-4 col-form-label text-md-right">{{ __('Business name') }}</label>

                <div class="col-md-6">
                    <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('business_name', $business_name) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="business_type" class="col-md-4 col-form-label text-md-right">{{ __('Business Type') }}</label>

                <div class="col-md-6">
	                <select name="business_type" class="form-control custom-select">
	                	@foreach($businessTypes as $value => $name)
	                	<option @if (old('business_type', $business_type) == $value) selected @endif value="{{ $value }}">{{ $name }}</option>
	                	@endforeach
	                </select>
	            </div>
            </div>

            <div class="form-group row">
                <label for="business_type_llc_classification" class="col-md-4 col-form-label text-md-right">{{ __('Classification') }}</label>

                <div class="col-md-6">
                    <input maxlength="1" id="business_type_llc_classification" type="text" class="form-control" name="business_type_llc_classification" value="{{ old('business_type_llc_classification', $business_type_llc_classification) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="exempt_payee_code" class="col-md-4 col-form-label text-md-right">{{ __('Exempt payee code') }}</label>

                <div class="col-md-6">
                    <input maxlength="10" id="exempt_payee_code" type="text" class="form-control" name="exempt_payee_code" value="{{ old('exempt_payee_code', $exempt_payee_code) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="factca" class="col-md-4 col-form-label text-md-right">{{ __('Factca') }}</label>

                <div class="col-md-6">
                    <input maxlength="10" id="factca" type="text" class="form-control" name="factca" value="{{ old('factca', $factca) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $address) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="address_2" class="col-md-4 col-form-label text-md-right">{{ __('Address 2') }}</label>

                <div class="col-md-6">
                    <input id="address_2" type="text" class="form-control" name="address_2" value="{{ old('address_2', $address_2) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="account_numbers" class="col-md-4 col-form-label text-md-right">{{ __('Account numbers') }}</label>

                <div class="col-md-6">
                    <input id="account_numbers" type="text" class="form-control" name="account_numbers" value="{{ old('account_numbers', $account_numbers) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="requestor_name" class="col-md-4 col-form-label text-md-right">{{ __('Requestor') }}</label>

                <div class="col-md-6">
                    <input id="requestor_name" type="text" class="form-control" name="requestor_name" value="{{ old('requestor_name', $requestor_name) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="requestor_address" class="col-md-4 col-form-label text-md-right">{{ __('Requestor address') }}</label>

                <div class="col-md-6">
                    <input id="requestor_address" type="text" class="form-control" name="requestor_address" value="{{ old('requestor_address', $requestor_address) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="requestor_address_2" class="col-md-4 col-form-label text-md-right">{{ __('Requestor Address 2') }}</label>

                <div class="col-md-6">
                    <input id="requestor_address_2" type="text" class="form-control" name="requestor_address_2" value="{{ old('requestor_address_2', $requestor_address_2) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="ssn" class="col-md-4 col-form-label text-md-right">{{ __('SSN') }}</label>

                <div class="col-md-6">
                    <input id="ssn" type="text" class="form-control" name="ssn" value="{{ old('ssn', $ssn) }}">
                </div>
            </div>


            <div class="form-group row">
                <label for="ein" class="col-md-4 col-form-label text-md-right">{{ __('EIN') }}</label>

                <div class="col-md-6">
                    <input id="ein" type="text" class="form-control" name="ein" value="{{ old('ein', $ein) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                <div class="col-md-6">
                    <input id="date" type="text" class="form-control" name="date" value="{{ old('date', $date) }}">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </form>


	</div>
@stop