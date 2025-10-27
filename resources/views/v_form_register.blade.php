@extends('layout.app')

@section('title', 'Register')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #A67C52;">Daftar Akun</h2>

                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('register.process') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="font-weight: 500; color: #5C4033;">Nama:</label>
                                <input type="text" name="name" id="name" class="form-control form-control-lg" required>
                            </div>

                            <div class="form-group">
                                <label for="email" style="font-weight: 500; color: #5C4033;">Email:</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg" required>
                            </div>

                            <div class="form-group">
                                <label for="password" style="font-weight: 500; color: #5C4033;">Password:</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" style="font-weight: 500; color: #5C4033;">Konfirmasi Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-lg btn-block" style="
                                    background-color: #A67C52; 
                                    color: white; 
                                    padding: 12px 20px; 
                                    border-radius: 30px; 
                                    font-weight: 600;
                                ">Daftar</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p>Sudah punya akun? <a href="{{ route('login') }}" style="color: #A67C52; text-decoration: underline;">Login disini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Custom CSS to add more elegance -->
    <style>
        body {
            background: linear-gradient(135deg, #E3CAA5, #DFC8B2);
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #A67C52;
            font-size: 16px;
            padding: 12px;
        }

        .btn {
            background-color: #A67C52;
            border-radius: 30px;
            font-weight: 600;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #5C4033;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .form-group label {
            font-weight: 500;
            color: #5C4033;
        }

        .form-control:focus {
            border-color: #A67C52;
            box-shadow: 0 0 5px rgba(166, 124, 82, 0.5);
        }
    </style>
@endsection
