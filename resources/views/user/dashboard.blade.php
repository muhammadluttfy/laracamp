{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.app')

@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            @forelse ($checkouts as $checkout)
                                <tr class="align-middle border-bottom">
                                    <td width="18%">
                                        <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                                    </td>
                                    <td>
                                        <p class="mb-2">
                                            <strong>{{ $checkout->Camp->title }}</strong>
                                        </p>
                                        <p>
                                            {{ $checkout->created_at->format('M d, Y') }}
                                        </p>
                                    </td>
                                    <td>
                                        <strong>${{ $checkout->Camp->price }}</strong>
                                    </td>
                                    <td>
                                        @if ($checkout->is_paid)
                                            <strong class="text-success">Payment Success</strong>
                                        @else
                                            <strong class="text-danger">Waiting for Payment</strong>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="https://wa.me/6282340378657?text=Hi, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}"
                                            class="btn btn-primary">
                                            Get Contact Support
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        No Data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection