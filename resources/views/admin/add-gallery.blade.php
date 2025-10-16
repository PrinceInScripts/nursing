<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
            color: #fff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .upload-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Upload Box */
        .upload-box {
            position: relative;
            padding: 3rem 2rem;
            text-align: center;
            border: 3px dashed rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            cursor: pointer;
        }

        .upload-box.dragover {
            border-color: #f093fb;
            background: rgba(240, 147, 251, 0.1);
            transform: scale(1.02);
        }

        .upload-box.uploading {
            border-color: #f093fb;
            background: rgba(240, 147, 251, 0.05);
        }

        .upload-content {
            transition: all 0.3s ease;
        }

        .upload-box.uploading .upload-content {
            opacity: 0;
            visibility: hidden;
        }

        .upload-box.uploading .upload-progress {
            opacity: 1;
            visibility: visible;
        }

        .upload-icon {
            margin-bottom: 1.5rem;
            color: #f093fb;
        }

        .upload-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .upload-subtitle {
            color: #e2e8f0;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .upload-button {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }

        .upload-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
        }

        /* Progress */
        .upload-progress {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            text-align: center;
        }

        .progress-circle {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-bar {
            transition: stroke-dashoffset 0.3s ease;
            stroke-linecap: round;
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: 600;
            font-size: 1rem;
            color: #fff;
        }

        .progress-label {
            color: #e2e8f0;
            font-size: 0.9rem;
        }

        /* Files Preview */
        .files-preview {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.4s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .files-preview.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .preview-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #fff;
        }

        .add-more-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-more-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .files-list {
            display: grid;
            gap: 1rem;
        }

        .file-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .file-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .file-preview {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
        }

        .file-info {
            flex: 1;
        }

        .file-name {
            font-weight: 500;
            color: #fff;
            margin-bottom: 0.25rem;
        }

        .file-size {
            font-size: 0.85rem;
            color: #e2e8f0;
        }

        .file-status {
            margin-right: 1rem;
        }

        .status-icon {
            font-size: 1.5rem;
        }

        .status-uploading {
            color: #f093fb;
        }

        .status-success {
            color: #48bb78;
        }

        .file-actions {
            display: flex;
            gap: 0.5rem;
        }

        .file-action {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-action:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .file-action.delete:hover {
            background: rgba(245, 87, 108, 0.2);
            border-color: #f5576c;
        }

        /* Upload Complete */
        .upload-complete {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .complete-header {
            margin-bottom: 2rem;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            margin: 0 auto 1.5rem;
            animation: successBounce 0.6s ease;
        }

        @keyframes successBounce {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .complete-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .complete-subtitle {
            color: #e2e8f0;
            font-size: 1rem;
        }

        .complete-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .new-upload-btn,
        .view-files-btn {
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .new-upload-btn {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
        }

        .new-upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
        }

        .view-files-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .view-files-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Success Animation */
        .success-animation {
            text-align: center;
        }

        .success-animation .success-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: successPulse 1.5s infinite;
        }

        @keyframes successPulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .success-text {
            font-size: 1.3rem;
            font-weight: 600;
            color: #fff;
        }

        /* Error States */
        .file-item.error {
            border: 1px solid #fecaca;
            background: #fef2f2;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .upload-box {
                padding: 2rem 1rem;
                margin: 1rem;
            }

            .upload-title {
                font-size: 1.25rem;
            }

            .files-preview {
                padding: 1rem;
            }

            .file-item {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .file-preview {
                margin-right: 0;
            }

            .file-actions {
                justify-content: center;
            }
        }

        /* Loading Animation */
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .loading {
            animation: spin 1s linear infinite;
        }

        /* Drag and Drop Visual Feedback */
        .upload-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(99, 102, 241, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 13px;
        }

        .upload-box.dragover::before {
            opacity: 1;
        }

        /* Animation for slide out */
        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        /* Error notifications */
        .error-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(254, 226, 226, 0.95);
            color: #dc2626;
            padding: 1rem;
            border-radius: 12px;
            border: 1px solid rgba(252, 165, 165, 0.5);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            backdrop-filter: blur(10px);
            max-width: 300px;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 2rem;">Image Upload Component</h1>
       <div class="event-info" style="max-width: 600px; margin: 0 auto 30px; text-align: left;">
    <div style="display: flex; flex-direction: column; gap: 15px; background: #f9f9fb; padding: 20px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.08);">
        <div>
            <label for="eventName" style="display:block; font-weight:500; color:#444; margin-bottom:6px;">
                Event Name
            </label>
            <input type="text" id="eventName" placeholder="e.g. Annual Day 2025"
                class="form-control"
                style="width:100%; padding:10px 14px; border:1px solid #ccc; border-radius:8px; font-size:15px; outline:none; transition: all 0.2s ease;">
        </div>

        <div>
            <label for="eventType" style="display:block; font-weight:500; color:#444; margin-bottom:6px;">
                Select Event Type
            </label>
            <select id="eventType" class="form-select"
                style="width:100%; padding:10px 14px; border:1px solid #ccc; border-radius:8px; font-size:15px; outline:none; cursor:pointer; transition: all 0.2s ease;">
                <option value="">Select Event Type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

        <div class="upload-container">
            <div class="upload-box" id="uploadBox">
                <div class="upload-content">
                    <div class="upload-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="upload-title">Drop files here or click to upload</h3>
                    <p class="upload-subtitle">Support for single or bulk uploads. Strictly PNG, JPG and GIF files only.
                    </p>
                    <button class="upload-button" type="button">Choose Files</button>
                    <input type="file" id="fileInput" multiple accept="image/*" hidden>
                </div>

                <div class="upload-progress" id="uploadProgress">
                    <div class="progress-circle">
                        <svg class="progress-ring" width="60" height="60">
                            <circle cx="30" cy="30" r="25" stroke="#4a5568" stroke-width="4"
                                fill="none" />
                            <circle class="progress-bar" cx="30" cy="30" r="25" stroke="#f093fb"
                                stroke-width="4" fill="none" stroke-dasharray="157" stroke-dashoffset="157" />
                        </svg>
                        <span class="progress-text">0%</span>
                    </div>
                    <p class="progress-label">Uploading files...</p>
                </div>
            </div>

            <div class="files-preview" id="filesPreview">
                {{-- <div class="preview-header">
                    <h4 class="preview-title">Selected Files</h4>
                    <button class="add-more-btn" id="addMoreBtn" style="display: none;">Add More Files</button>
                </div> --}}
                <div class="files-list" id="filesList">
                    <!-- Files will be dynamically added here -->
                </div>
            </div>

            <div class="upload-complete" id="uploadComplete" style="display: none;">
                <div class="complete-header">
                    {{-- <div class="success-icon">✓</div> --}}
                    <h3 class="complete-title">Upload Successful!</h3>
                    <p class="complete-subtitle">Your files have been uploaded successfully</p>
                </div>
                <button onclick="uploadFiles()" class="new-upload-btn" id="">Upload Now</button>
                <div class="complete-actions">
                    {{-- <button class="new-upload-btn" id="newUploadBtn">Start New Upload</button>
                    <button class="view-files-btn" id="viewFilesBtn">View Uploaded Files</button> --}}
                </div>
            </div>
        </div>
    </div>

      {{-- load ajax script to upload files to server --}}

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        class FileUploadComponent {
            constructor() {
                this.uploadBox = document.getElementById('uploadBox');
                this.fileInput = document.getElementById('fileInput');
                this.filesPreview = document.getElementById('filesPreview');
                this.filesList = document.getElementById('filesList');
                this.uploadProgress = document.getElementById('uploadProgress');
                this.uploadComplete = document.getElementById('uploadComplete');
                // this.addMoreBtn = document.getElementById('addMoreBtn');
                // this.newUploadBtn = document.getElementById('newUploadBtn');
                // this.viewFilesBtn = document.getElementById('viewFilesBtn');

                this.files = [];
                this.maxFileSize = 10 * 1024 * 1024; // 10MB
                this.allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

                this.init();
            }

            init() {
                this.setupEventListeners();
            }

            setupEventListeners() {
                // Upload box events
                this.uploadBox.addEventListener('click', () => {
                    this.fileInput.click();
                });

                this.fileInput.addEventListener('change', (e) => {
                    this.handleFiles(e.target.files);
                });

                // Drag and drop events
                this.uploadBox.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    this.uploadBox.classList.add('dragover');
                });

                this.uploadBox.addEventListener('dragleave', (e) => {
                    e.preventDefault();
                    this.uploadBox.classList.remove('dragover');
                });

                this.uploadBox.addEventListener('drop', (e) => {
                    e.preventDefault();
                    this.uploadBox.classList.remove('dragover');
                    this.handleFiles(e.dataTransfer.files);
                });

                // Action buttons
                // this.addMoreBtn.addEventListener('click', () => {
                //     this.fileInput.click();
                // });

                // this.newUploadBtn.addEventListener('click', () => {
                //     this.startNewUpload();
                // });

                // this.viewFilesBtn.addEventListener('click', () => {
                //     this.viewUploadedFiles();
                // });

                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    document.addEventListener(eventName, (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                });
            }
            handleFiles(fileList) {
                const newFiles = Array.from(fileList);

                newFiles.forEach(file => {
                    if (this.validateFile(file)) {
                        this.addFile(file);
                    }
                });

                if (this.files.length > 0) {
                    this.showPreview();
                    this.simulateUpload();
                }
            }

            validateFile(file) {
                // Check file type
                if (!this.allowedTypes.includes(file.type)) {
                    this.showError(`${file.name}: Only JPG, PNG, and GIF files are allowed.`);
                    return false;
                }

                // Check file size
                if (file.size > this.maxFileSize) {
                    this.showError(`${file.name}: File size must be less than 10MB.`);
                    return false;
                }

                // Check if file already exists
                if (this.files.some(f => f.name === file.name && f.size === file.size)) {
                    this.showError(`${file.name}: File already selected.`);
                    return false;
                }

                return true;
            }

            addFile(file) {
                const fileObj = {
                    file: file,
                    id: Date.now() + Math.random(),
                    name: file.name,
                    size: this.formatFileSize(file.size),
                    status: 'pending',
                    progress: 0
                };

                this.files.push(fileObj);
                this.renderFile(fileObj);
            }

            renderFile(fileObj) {
                const fileElement = document.createElement('div');
                fileElement.className = 'file-item';
                fileElement.setAttribute('data-file-id', fileObj.id);

                // Create preview image
                const reader = new FileReader();
                reader.onload = (e) => {
                    fileElement.innerHTML = `
                <img src="${e.target.result}" alt="${fileObj.name}" class="file-preview">
                <div class="file-info">
                    <div class="file-name">${fileObj.name}</div>
                    <div class="file-size">${fileObj.size}</div>
                </div>
                <div class="file-status">
                    <div class="status-icon status-uploading">⏳</div>
                </div>
                <div class="file-actions">
                    <button class="file-action delete" onclick="fileUpload.removeFile('${fileObj.id}')">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                        </svg>
                    </button>
                </div>
            `;
                };
                reader.readAsDataURL(fileObj.file);

                this.filesList.appendChild(fileElement);
            }

            showPreview() {
                this.filesPreview.classList.add('show');
                // this.addMoreBtn.style.display = 'inline-block';
            }

            simulateUpload() {
                this.uploadBox.classList.add('uploading');

                let completedFiles = 0;
                const totalFiles = this.files.length;

                this.files.forEach((fileObj, index) => {
                    setTimeout(() => {
                        this.uploadFile(fileObj, (progress) => {
                            const overallProgress = ((completedFiles + progress / 100) /
                                totalFiles) * 100;
                            this.updateProgress(overallProgress);

                            if (progress === 100) {
                                completedFiles++;
                                if (completedFiles === totalFiles) {
                                    this.completeUpload();
                                }
                            }
                        });
                    }, index * 200);
                });
            }

            uploadFile(fileObj, progressCallback) {
                let progress = 0;
                const fileElement = document.querySelector(`[data-file-id="${fileObj.id}"]`);

                const uploadInterval = setInterval(() => {
                    progress += Math.random() * 15;
                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(uploadInterval);

                        fileObj.status = 'success';
                        const statusIcon = fileElement.querySelector('.status-icon');
                        statusIcon.className = 'status-icon status-success';
                        statusIcon.textContent = '✓';
                    }

                    progressCallback(progress);
                }, 100 + Math.random() * 200);
            }

            updateProgress(progress) {
                const progressBar = document.querySelector('.progress-bar');
                const progressText = document.querySelector('.progress-text');

                const circumference = 2 * Math.PI * 25;
                const offset = circumference - (progress / 100) * circumference;

                progressBar.style.strokeDashoffset = offset;
                progressText.textContent = Math.round(progress) + '%';
            }
            completeUpload() {
                setTimeout(() => {
                    this.uploadBox.style.display = 'none';
                    this.uploadComplete.style.display = 'block';

                    const completeTitle = this.uploadComplete.querySelector('.complete-title');
                    const completeSubtitle = this.uploadComplete.querySelector('.complete-subtitle');

                    completeTitle.textContent = 'Upload Successful!';
                    completeSubtitle.textContent = `${this.files.length} file(s) uploaded successfully`;
                }, 500);
            }

            startNewUpload() {
                // Reset all states
                this.files = [];

                // Clear files list
                this.filesList.innerHTML = '';

                // Reset displays
                this.uploadComplete.style.display = 'none';
                this.uploadBox.style.display = 'block';
                this.uploadBox.classList.remove('uploading', 'success');
                this.filesPreview.classList.remove('show');
                // this.addMoreBtn.style.display = 'none';

                // Reset progress
                const progressBar = document.querySelector('.progress-bar');
                const progressText = document.querySelector('.progress-text');
                progressBar.style.strokeDashoffset = '157';
                progressText.textContent = '0%';

                // Re-setup file input
                this.fileInput.value = '';
            }

            viewUploadedFiles() {
                // Show the uploaded files by hiding complete screen and showing files
                this.uploadComplete.style.display = 'none';
                this.filesPreview.classList.add('show');
                // this.addMoreBtn.style.display = 'inline-block';

                // Update preview title
                const previewTitle = this.filesPreview.querySelector('.preview-title');
                previewTitle.textContent = 'Uploaded Files';
            }

            formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            showError(message) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-notification';
                errorDiv.style.animation = 'slideInRight 0.3s ease';
                errorDiv.textContent = message;

                document.body.appendChild(errorDiv);

                setTimeout(() => {
                    errorDiv.style.animation = 'slideOutRight 0.3s ease';
                    setTimeout(() => errorDiv.remove(), 300);
                }, 4000);
            }

            removeFile(fileId) {
                this.files = this.files.filter(f => f.id != fileId);
                const fileElement = document.querySelector(`[data-file-id="${fileId}"]`);

                if (fileElement) {
                    fileElement.style.animation = 'slideOut 0.3s ease forwards';
                    setTimeout(() => {
                        fileElement.remove();

                        if (this.files.length === 0) {
                            this.filesPreview.classList.remove('show');
                            // this.addMoreBtn.style.display = 'none';
                            this.uploadBox.classList.remove('uploading');
                        }
                    }, 300);
                }
            }
        }

       

        function uploadFiles() {
    if (!fileUpload.files.length) {
        fileUpload.showError('Please select at least one file to upload.');
        return;
    }

    const eventName = document.getElementById('eventName').value.trim();
    const eventType = document.getElementById('eventType').value;

   const formData = new FormData();

// Append files
fileUpload.files.forEach(f => formData.append('images[]', f.file));

formData.append('event_name', eventName);
formData.append('event_type', eventType);

// Log all entries
console.log("Files to be uploaded:", fileUpload.files);
for (let [key, value] of formData.entries()) {
    console.log(key, value);
}



    // AJAX request to upload files
    $.ajax({
        url: "{{ route('gallery.store') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel
        },
        beforeSend: function() {
            // Show uploading state
            fileUpload.uploadBox.classList.add('uploading');
            fileUpload.uploadComplete.style.display = 'none';
            fileUpload.filesPreview.classList.remove('show');
        },
        success: function(response) {
            console.log('Upload successful:', response);
            // Handle success response
            fileUpload.completeUpload();


            // reload
            window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error('Upload failed:', xhr,error);
            // Handle error response
            fileUpload.showError('Upload failed. Please try again.');
            fileUpload.startNewUpload();
        }
    });


}


        // Add slide animations for notifications
        const style = document.createElement('style');
        style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    @keyframes slideOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
`;
        document.head.appendChild(style);

        // Initialize the component
        let fileUpload;
        document.addEventListener('DOMContentLoaded', () => {
            fileUpload = new FileUploadComponent();
        });

        // Export for potential module use
        if (typeof module !== 'undefined' && module.exports) {
            module.exports = FileUploadComponent;
        }
    </script>

</body>

</html>
