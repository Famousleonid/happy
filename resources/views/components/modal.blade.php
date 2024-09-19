<style>
    .modal-content {
        position: relative;
        background-color: #343A40;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Ширина модального окна */
        top: 40%;
        transform: translateY(-50%);
    }

    /* Кнопка закрытия */
    .modal-content button {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    @media (max-width: 768px) {
        .modal-content {
            width: calc(100% - 20px); /* Ширина с учетом отступов по бокам */
            margin: 10px; /* Отступы по бокам */
            top: 50%;
            transform: translateY(-50%);
        }
    }

</style>

<div id="{{ $id }}" class="modal" style="display: none;" onclick="closeModal('{{ $id }}')">
    <div class="modal-content text-white" onclick="event.stopPropagation();">
        <h3>{{ $title ?? '' }}</h3>
        {{ $slot }}
        <button onclick="closeModal('{{ $id }}')">X</button>
    </div>
</div>


