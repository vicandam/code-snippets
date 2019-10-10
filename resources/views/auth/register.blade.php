@extends('layouts.app')

@push('styles')
    <style>
        button.v-app-bar__nav-icon{
            display: none;
        }
    </style>
@endpush


@section('content')

    <v-container
        class="fill-height"
        fluid
    >
        <v-row
            align="center"
            justify="center"
        >
            <v-col
                cols="12"
                sm="8"
                md="4"
            >
                <v-form method="POST" action="{{ route('register') }}">
                    @csrf
                    <v-card class="elevation-12">
                        <v-toolbar
                            color="primary"
                            dark
                            flat
                        >
                            <v-toolbar-title>{{ __('Register') }}</v-toolbar-title>
                        </v-toolbar>
                        <v-card-text>
                            <v-text-field
                                label="Name"
                                name="name" value="{{ old('name') }}"
                                autocomplete="name"
                                autofocus
                                prepend-icon="person"
                                type="text"
                                required
                                @error('name')
                                error-messages = "{{ $message }}"
                                @enderror
                            ></v-text-field>

                            <v-text-field
                                label="{{ __('E-Mail Address') }}"
                                name="email" value="{{ old('email') }}"
                                autocomplete="email"
                                prepend-icon="person"
                                type="email"
                                required
                                @error('email')
                                error-messages = "{{ $message }}"
                                @enderror
                            ></v-text-field>

                            <v-text-field
                                id="password"
                                label="{{ __('Password') }}"
                                name="password"
                                required
                                @error('password')
                                error-messages = "{{ $message }}"
                                @enderror
                                autocomplete="new-password"
                                prepend-icon="lock"
                                type="password"
                            ></v-text-field>

                            <v-text-field
                                id="password-confirm"
                                label="{{ __('Confirm Password') }}"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                prepend-icon="lock"
                                type="password"
                            ></v-text-field>

                        </v-card-text>
                        <v-card-actions>
                            <div class="flex-grow-1"></div>
                            <v-btn type="submit" color="primary">{{ __('Register') }}</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-form>
            </v-col>
        </v-row>
    </v-container>
@endsection
@push('scripts')
    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: () => ({
                drawer: false,
                items: [],
            }),
        })
    </script>
@endpush
