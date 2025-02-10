/project-root
│
├── /app                  # Mã nguồn ứng dụng (Business Logic)
│   ├── /Controllers      # Các controller xử lý logic cho mỗi request
│   ├── /Models           # Các mô hình (Model) dùng để làm việc với dữ liệu
│   ├── /Views            # Các view hoặc template hiển thị giao diện
│   ├── /Services         # Các dịch vụ xử lý logic phức tạp (nếu có)
│   └── /Helpers          # Các hàm tiện ích chung
│
├── /config               # Các tệp cấu hình
│   ├── config.php        # Cấu hình chung cho ứng dụng
│   └── database.php      # Cấu hình kết nối cơ sở dữ liệu
│
├── /public               # Thư mục chứa các tệp truy cập công khai (public)
│   ├── /assets           # Các tài nguyên công cộng như CSS, JS, hình ảnh
│   ├── index.php         # Entry point của ứng dụng
│   ├── .htaccess         # Cấu hình URL và các rule cho Apache (nếu sử dụng)
│   └── /uploads          # Thư mục chứa các tệp tải lên
│
├── /storage              # Thư mục chứa các tệp tạm thời, cache, log
│   ├── /cache            # Cache của ứng dụng
│   ├── /logs             # Các tệp log của ứng dụng
│   └── /sessions         # Thư mục chứa session tạm thời
│
├── /vendor               # Thư mục chứa các thư viện bên ngoài (composer)
│
├── /tests                # Thư mục chứa các bài kiểm tra (unit tests)
│
├── composer.json         # Quản lý các phụ thuộc của dự án (composer)
├── .gitignore            # Các tệp và thư mục sẽ bị loại trừ khỏi Git
└── README.md             # Tài liệu giới thiệu dự án





/app:

Controllers: Chứa các lớp controller để xử lý các yêu cầu từ người dùng, ví dụ như thêm, sửa, xóa sản phẩm.
Models: Chứa các mô hình (model) đại diện cho cơ sở dữ liệu hoặc thực hiện các thao tác với dữ liệu (chẳng hạn như lớp Product đại diện cho sản phẩm).
Views: Chứa các tệp template hoặc view dùng để hiển thị giao diện người dùng. Có thể sử dụng hệ thống template như Twig hoặc Blade.
Services: Các lớp dịch vụ giúp xử lý các công việc phức tạp, chẳng hạn như gửi email, tạo thông báo, xử lý thanh toán.
Helpers: Chứa các hàm tiện ích chung (ví dụ: hàm kiểm tra tính hợp lệ của dữ liệu đầu vào).
/config:

config.php: Các cài đặt cấu hình ứng dụng, như thông tin API, mật khẩu, key bảo mật.
database.php: Cấu hình kết nối cơ sở dữ liệu.
/public:

Thư mục công khai chứa các tệp mà người dùng có thể truy cập trực tiếp (như CSS, JavaScript, hình ảnh).
index.php là entry point của ứng dụng, nơi tiếp nhận các yêu cầu đầu tiên.
/storage:

Thư mục lưu trữ các tệp như file cache, log lỗi, và session của người dùng.
/vendor:

Chứa các thư viện được cài đặt qua Composer.
/tests:

Chứa các bài kiểm tra cho ứng dụng, có thể là unit tests hoặc functional tests.