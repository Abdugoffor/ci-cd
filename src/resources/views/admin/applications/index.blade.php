@extends('layouts.admin')
@section('title', 'Заявки')
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Support tickets -->
                <div class="card">

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Имя</th>
                                    <th>Тип</th>
                                    <th>Дата рождения</th>
                                    <th>Пол</th>
                                    <th>Почта</th>
                                    <th>Требуется виза</th>
                                    <th>Оконч регистрации</th>
                                    <th>Дата прибытия</th>
                                    <th>Дата отъезда</th>
                                    <th>Статус</th>
                                    <th>Посмотреть</th>
                                    <th>История</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>{{ $model->first_name }}</td>
                                        <td>{{ optional($model->accreditationCategory)->name['uz'] ?? '' }}</td>
                                        <td>
                                            {{ $model->date_of_birth }}
                                        </td>
                                        <td>
                                            {{ $model->gender }}
                                        </td>
                                        <td>
                                            {{ $model->email }}
                                        </td>
                                        <td>
                                            {{ $model->requires_visa ? 'Да' : 'Нет' }}
                                        </td>
                                        <td>
                                            {{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                                        </td>
                                        <td>
                                            {{ $model->arrival_details ? $model->arrival_details->format('d-m-Y') : '' }}
                                        </td>
                                        <td>
                                            {{ $model->departure_details ? $model->departure_details->format('d-m-Y') : '' }}
                                        </td>
                                        <td>
                                            <span class="badge badge-teal badge-pill ml-auto">
                                                {{ $model->status }}
                                                <div class="list-icons ml-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                                class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <!-- Qabul qilish tugmasi -->
                                                            <a href="{{ route('application.status', [$model->id, 'approved']) }}"
                                                                class="dropdown-item">
                                                                <i class="icon-checkmark3 text-success"></i> Acceptance
                                                            </a>
                                                            <!-- Canceled tugmasi: Modalni ochadi -->
                                                            <span href="#" class="dropdown-item canceled-btn"
                                                                data-toggle="modal"
                                                                data-target="#cancelModal{{ $model->id }}">
                                                                <i class="icon-cross2 text-danger"></i> Canceled
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>

                                            <!-- Canceled Modal (Har bir model uchun alohida) -->
                                            <div id="cancelModal{{ $model->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Причина отмены:
                                                                {{ $model->first_name }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <form action="{{ route('application.cancel', $model->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Причина отмены:</label>
                                                                    <textarea name="cancel_reason" class="form-control" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Закрыть</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Подтвердить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light" data-toggle="modal"
                                                data-target="#modal_full{{ $model->id }}">Посмотреть</i></button>
                                            <!-- Full width modal -->
                                            <div id="modal_full{{ $model->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Заявка</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>Имя</th>
                                                                                <td>{{ $model->first_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Фамилия</th>
                                                                                <td>{{ $model->last_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Дата рождения</th>
                                                                                <td>{{ $model->date_of_birth }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Пол</th>
                                                                                <td>{{ $model->gender }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Email</th>
                                                                                <td>{{ $model->email }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Email подтвержден</th>
                                                                                <td>{{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>FIDE ID</th>
                                                                                <td>{{ $model->fide_id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Категория аккредитации</th>
                                                                                <td>{{ $model->accreditation_category_id }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Гражданство</th>
                                                                                <td>{{ $model->citizenship }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Номер паспорта</th>
                                                                                <td>{{ $model->passport_number }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Дата выдачи паспорта</th>
                                                                                <td>{{ $model->passport_issue_date }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Срок действия паспорта</th>
                                                                                <td>{{ $model->passport_expiry_date }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Орган выдачи паспорта</th>
                                                                                <td>{{ $model->passport_issuing_authority }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Копия паспорта</th>
                                                                                <td>
                                                                                    @if ($model->passport_copy)
                                                                                        <a href="{{ asset($model->passport_copy) }}"
                                                                                            target="_blank">Смотреть</a>
                                                                                    @else
                                                                                        Нет данных
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Телефон</th>
                                                                                <td>{{ $model->phone }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Фото</th>
                                                                                <td>
                                                                                    @if ($model->photo)
                                                                                        <img src="{{ asset($model->photo) }}"
                                                                                            alt="Фото" width="100">
                                                                                    @else
                                                                                        Нет фото
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Виза требуется?</th>
                                                                                <td>
                                                                                    {{ $model->requires_visa ? 'Да' : 'Нет' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Дата прибытия</th>
                                                                                <td>{{ optional($model->arrival_details)->format('d-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Дата отъезда</th>
                                                                                <td>{{ optional($model->departure_details)->format('d-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Детали проживания</th>
                                                                                <td>{{ $model->accommodation_details }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Детали ПЦР-теста</th>
                                                                                <td>{{ $model->pcr_test_details }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Статус</th>
                                                                                <td>{{ $model->status }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Закрыть</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /full width modal -->
                                        </td>
                                        <td>
                                            {!! historyCheck($model) !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /support tickets -->
                {{ $models->links() }}
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->
@endsection
