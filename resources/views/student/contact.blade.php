@extends('student.layout.app')
@section('styles')
    <style>
        td:nth-child(1) {
            width: 30%;
            font-weight: bold;
            text-align: right
        }

        td:nth-child(2) {
            width: 5%
        }

        td:nth-child(3) {
            width: 60%
        }

    </style>
@endsection
@section('page-content')
    <div class="row text-capitalize">
        <div class="col-6 col-12 col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <p class="h5">contact details:</p>
                </div>
                <div class="card-body">
                    <p class="text-center"><strong> You can contact us with any of following media</strong></p>
                    <table class="table table-borderless">
                        <tr>
                            <td>whatsapp :</td>
                            <td></td>
                            <td><a href="https://wa.me/91">7776999440</a> ,
                                <a href="https://wa.me/91">7620769633</a>
                            </td>
                        </tr>
                        <tr>
                            <td>mobile number :</td>
                            <td></td>
                            <td><a href="tel:">7776999440</a> </td>
                        </tr>
                        <tr>
                            <td>email :</td>
                            <td></td>
                            <td><a href="mailto:">madcraft2019@gmail.com</a>
                                <p class="text-danger">(for office/commercial use only)</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
