<?= $this->extend('layout/main'); ?>

<?= $this->section('page-Content'); ?>

<style>
    .chat-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .chat-header {
        background: linear-gradient(135deg, #99BD49 0%, #7a9939 100%);
        color: white;
        padding: 1.5rem;
        text-align: center;
    }

    .suggestions-container {
        background: #f8f9fa;
        padding: 1rem;
        border-bottom: 2px solid #dee2e6;
    }

    .suggestions-title {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 0.75rem;
        font-weight: 600;
    }

    .suggestions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 0.5rem;
    }

    .suggestion-chip {
        background: white;
        color: #99BD49;
        border: 2px solid #99BD49;
        padding: 0.6rem 1rem;
        border-radius: 25px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s;
        text-align: center;
        font-weight: 500;
        box-shadow: 0 2px 5px rgba(153, 189, 73, 0.1);
    }

    .suggestion-chip:hover {
        background: #99BD49;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(153, 189, 73, 0.3);
    }

    .feedback-buttons {
        border-top: 1px solid #eee;
        padding-top: 0.75rem;
        margin-top: 0.75rem;
    }

    .feedback-buttons .btn {
        font-size: 0.8rem;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
    }

    .chat-messages {
        height: 500px;
        overflow-y: auto;
        padding: 1.5rem;
        background: #f8f9fa;
        scroll-behavior: smooth;
    }

    .message {
        margin-bottom: 1.25rem;
        display: flex;
        flex-direction: column;
        animation: fadeIn 0.3s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .message.user {
        align-items: flex-end;
    }

    .message.bot {
        align-items: flex-start;
    }

    .message-bubble {
        max-width: 75%;
        padding: 1rem 1.25rem;
        border-radius: 18px;
        word-wrap: break-word;
        line-height: 1.5;
    }

    .message.user .message-bubble {
        background: linear-gradient(135deg, #99BD49 0%, #7a9939 100%);
        color: white;
        border-bottom-right-radius: 5px;
        box-shadow: 0 2px 8px rgba(153, 189, 73, 0.3);
    }

    .message.bot .message-bubble {
        background: white;
        color: #333;
        border: 1px solid #dee2e6;
        border-bottom-left-radius: 5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .message-label {
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 0.4rem;
        font-weight: 600;
        padding: 0 0.5rem;
    }

    .chat-input-container {
        padding: 1.25rem;
        background: white;
        border-top: 2px solid #dee2e6;
    }

    .typing-indicator {
        display: none;
        padding: 0.75rem 1.25rem;
        background: white;
        border-radius: 18px;
        width: fit-content;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .typing-indicator span {
        height: 8px;
        width: 8px;
        background: #6c757d;
        border-radius: 50%;
        display: inline-block;
        margin: 0 3px;
        animation: typing 1.4s infinite;
    }

    .typing-indicator span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .typing-indicator span:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes typing {
        0%, 60%, 100% {
            transform: translateY(0);
        }
        30% {
            transform: translateY(-10px);
        }
    }

    .chat-messages::-webkit-scrollbar {
        width: 8px;
    }

    .chat-messages::-webkit-scrollbar-track {
        background: #e9ecef;
        border-radius: 10px;
    }

    .chat-messages::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #99BD49 0%, #7a9939 100%);
        border-radius: 10px;
    }

    .chat-messages::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #7a9939 0%, #5a7929 100%);
    }

    .input-group .form-control {
        border-radius: 25px 0 0 25px;
        border: 2px solid #ced4da;
        padding: 0.75rem 1.25rem;
        font-size: 1rem;
    }

    .input-group .form-control:focus {
        border-color: #99BD49;
        box-shadow: 0 0 0 0.2rem rgba(153, 189, 73, 0.25);
    }

    .input-group .btn {
        border-radius: 0 25px 25px 0;
        padding: 0.75rem 2rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .chat-messages {
            height: 400px;
        }

        .suggestions-grid {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        }

        .message-bubble {
            max-width: 85%;
        }
    }
</style>

<div class="container-fluid bg-primary py-5 mb-4">
    <div class="container py-5">
        <div class="text-center text-white">
            <h5 class="d-inline-block text-uppercase border-bottom border-5 mb-3">Chatbot Kelurahan Jagakarsa</h5>
            <h1 class="display-5 mb-3">💬 Asisten Virtual Anda</h1>
            <p class="lead">Tanyakan apa saja tentang layanan kelurahan kami</p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="chat-container">
        <div class="chat-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">🤖 Chatbot Kelurahan</h4>
                <small>Siap membantu Anda 24/7</small>
            </div>
            <button onclick="clearChat()" class="btn btn-sm btn-outline-light" title="Bersihkan Chat">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>

        <div class="suggestions-container" id="suggestionsContainer">
            <div class="suggestions-title">💡 Pertanyaan yang sering ditanyakan:</div>
            <div class="suggestions-grid" id="suggestionsGrid">
                <!-- Will be loaded dynamically -->
                <span class="suggestion-chip" onclick="sendSuggestion('Jam operasional kelurahan')">⏰ Jam Buka</span>
                <span class="suggestion-chip" onclick="sendSuggestion('Alamat kelurahan')">📍 Alamat</span>
                <span class="suggestion-chip" onclick="sendSuggestion('Layanan yang tersedia')">📋 Layanan</span>
                <span class="suggestion-chip" onclick="sendSuggestion('Nomor kontak kelurahan')">📞 Kontak</span>
                <span class="suggestion-chip" onclick="sendSuggestion('Cara membuat KTP')">🆔 Buat KTP</span>
                <span class="suggestion-chip" onclick="sendSuggestion('Persyaratan Kartu Keluarga')">👨‍👩‍👧‍👦 Kartu Keluarga</span>
            </div>
        </div>

        <div class="chat-messages" id="chatMessages">
            <div class="message bot">
                <div class="message-label">Bot</div>
                <div class="message-bubble">
                    👋 <strong>Halo! Selamat datang di Chatbot Kelurahan Jagakarsa.</strong><br><br>
                    Saya siap membantu Anda dengan informasi tentang:
                    <ul style="margin: 0.5rem 0 0 0; padding-left: 1.25rem;">
                        <li>Jam operasional</li>
                        <li>Layanan administrasi</li>
                        <li>Persyaratan dokumen</li>
                        <li>Dan informasi lainnya</li>
                    </ul>
                    <br>Silakan pilih pertanyaan di atas atau ketik pertanyaan Anda sendiri! 😊
                </div>
            </div>
            <div class="typing-indicator" id="typingIndicator">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="chat-input-container">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Ketik pertanyaan Anda..." id="userInput" onkeypress="handleKeyPress(event)" autocomplete="off">
                <button class="btn btn-primary" onclick="sendMessage()">
                    <i class="fa fa-paper-plane me-2"></i>Kirim
                </button>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="<?= base_url('') ?>" class="btn btn-outline-primary btn-lg">
            <i class="fa fa-arrow-left me-2"></i>Kembali ke Beranda
        </a>
    </div>
</div>

<script>
    const chatMessages = document.getElementById('chatMessages');
    const userInput = document.getElementById('userInput');
    const typingIndicator = document.getElementById('typingIndicator');
    const baseUrl = '<?= base_url() ?>';

    function handleKeyPress(event) {
        if (event.keyCode === 13) {
            sendMessage();
        }
    }

    function sendSuggestion(text) {
        userInput.value = text;
        sendMessage();
    }

    function addMessage(text, isUser, showFeedback = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
        
        const label = document.createElement('div');
        label.className = 'message-label';
        label.textContent = isUser ? 'Anda' : 'Bot';
        
        const bubble = document.createElement('div');
        bubble.className = 'message-bubble';
        bubble.innerHTML = text;
        
        // Add feedback buttons for bot messages
        if (!isUser && showFeedback) {
            const feedbackDiv = document.createElement('div');
            feedbackDiv.className = 'feedback-buttons';
            feedbackDiv.innerHTML = `
                <small class="text-muted d-block mt-2 mb-1">Apakah jawaban ini membantu?</small>
                <button class="btn btn-sm btn-outline-success me-1" onclick="sendFeedback(this, 'helpful')">
                    <i class="fas fa-thumbs-up"></i> Ya
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="sendFeedback(this, 'not-helpful')">
                    <i class="fas fa-thumbs-down"></i> Tidak
                </button>
            `;
            bubble.appendChild(feedbackDiv);
        }
        
        messageDiv.appendChild(label);
        messageDiv.appendChild(bubble);
        
        chatMessages.insertBefore(messageDiv, typingIndicator);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function sendFeedback(btn, type) {
        const parent = btn.parentElement;
        parent.innerHTML = type === 'helpful' 
            ? '<small class="text-success"><i class="fas fa-check-circle"></i> Terima kasih atas feedback Anda!</small>'
            : '<small class="text-muted"><i class="fas fa-info-circle"></i> Terima kasih! Hubungi 021-7270954 untuk bantuan lebih lanjut.</small>';
    }

    function showTyping() {
        typingIndicator.style.display = 'block';
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function hideTyping() {
        typingIndicator.style.display = 'none';
    }

    async function sendMessage() {
        const message = userInput.value.trim();
        
        if (!message) return;
        
        // Add user message
        addMessage(message, true);
        userInput.value = '';
        
        // Show typing indicator
        showTyping();
        
        try {
            const response = await fetch(baseUrl + '/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message: message })
            });
            
            const data = await response.json();
            
            // Simulate typing delay for natural feel
            setTimeout(() => {
                hideTyping();
                const botResponse = data.messages && data.messages[0] ? data.messages[0].text : 'Maaf, terjadi kesalahan. Silakan coba lagi.';
                addMessage(botResponse, false, true);
            }, 600 + Math.random() * 400);
            
        } catch (error) {
            hideTyping();
            addMessage('❌ Maaf, terjadi kesalahan koneksi. Silakan coba lagi.', false);
        }
    }

    // Clear chat function
    function clearChat() {
        const messages = chatMessages.querySelectorAll('.message');
        messages.forEach((msg, index) => {
            if (index > 0) msg.remove(); // Keep welcome message
        });
    }

    // Auto-focus on input
    userInput.focus();
</script>

<?= $this->endSection(); ?>