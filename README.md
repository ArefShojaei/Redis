<h1 align="center">
    🚀 Redis - PHP In-Memory Key-Value Database
</h1>

<p align="center">
    A lightweight Redis-inspired in-memory database built with PHP.
    Store, manage, and explore your data using a powerful CLI interface
    or a live web dashboard.
</p>

<img width="1200" height="900" alt="Redis" src="https://github.com/user-attachments/assets/b20fbb5e-fc16-482a-934a-82e41e9cd98b" />

---

## ✨ Features

* 🔑 **Key-Value Storage** - Fast in-memory data management
* 💻 **Interactive CLI** - Manage your database through terminal commands
* 🌐 **Live Web Server** - Explore your data from a browser interface
* 📝 **String Operations** - Set, get, append, and manipulate text data
* 🔢 **Number Operations** - Increment and decrement numeric values
* 🗂️ **Hash Support** - Store structured objects using key-value pairs
* 📚 **List Support** - Manage ordered collections of values
* ⏱️ **Expiration System** - Set TTL for temporary data
* ⚡ **Fast & Lightweight** - Built entirely with pure PHP

---

# 📥 Installation

## Requirements

* PHP 8.1 or higher
* Composer

---

## Install with Composer

```bash
composer require arefshojaei/redis
```

---

## Clone from GitHub

```bash
git clone https://github.com/ArefShojaei/Redis.git
cd Redis
```

---

# 🚀 Getting Started

Redis can be used in two different modes.

## 1. Interactive CLI Mode

Run the database shell:

```bash
php bin/redis-cli
```

Or make it executable:

```bash
chmod +x ./bin/redis-cli
./bin/redis-cli
```

---

## 2. Web Dashboard Mode

Start the live server:

```bash
php bin/redis-server
```

Or:

```bash
chmod +x ./bin/redis-server
./bin/redis-server
```

Then open your browser:

```txt
http://localhost:8000
```

---

# 📚 Data Types & Commands

## 🔤 String Commands

Set and get values:

```bash
set username Robert

get username
```

Set and return old value:

```bash
getSet username Kevin
```

Multiple values:

```bash
mset name=John age=25 country=USA
```

Append text:

```bash
append message World
```

Expiration:

```bash
setex token 3600 secret-key

ttl token
```

Delete:

```bash
del username
unlink user1 user2 user3
```

---

## 🔢 Number Commands

Increase and decrease numbers:

```bash
set counter 10

incr counter
decr counter
```

Custom increment:

```bash
incrBy counter 5

decrBy counter 2
```

---

## 🗂 Hash Commands

Create object-like data:

```bash
hset user name Robert

hset user age 25
```

Multiple fields:

```bash
hmset user name:Robert age:25 role:admin
```

Get data:

```bash
hget user name

hgetall user
```

Other operations:

```bash
hkeys user
hvals user
hlen user
hexists user age
```

---

## 📋 List Commands

Push values:

```bash
lpush tasks "Build Redis"

rpush tasks "Write Documentation"
```

Read data:

```bash
lrange tasks 0 10

llen tasks
```

Remove items:

```bash
lpop tasks

rpop tasks
```

---

## 🗄 Database Commands

Show all stored data:

```bash
dump
```

List all keys:

```bash
keys
```

Remove all data:

```bash
flushdb
```

---

## 🔚 Session Commands

Exit the CLI:

```bash
quit
```

Check connection:

```bash
ping
```

---

# 💡 Example Workflow

Create a simple user record:

```bash
hset user:1 name Robert

hset user:1 email robert@example.com

hset user:1 role admin
```

Retrieve the data:

```bash
hgetall user:1
```

---

# 🔥 Why This Project?

This project is useful for learning:

* Database engine concepts
* Key-value storage design
* Command parsing
* CLI application development
* Memory management
* Data structures implementation in PHP

It is a great educational project for understanding how systems like Redis work internally.

---

# 🤝 Contributing

Contributions are welcome.

1. Fork the repository
2. Create a feature branch

```bash
git checkout -b feature/amazing-feature
```

3. Commit your changes:

```bash
git commit -m "Add amazing feature"
```

4. Push your branch:

```bash
git push origin feature/amazing-feature
```

5. Open a Pull Request

---

# 👨‍💻 Author

**Aref Shojaei**
- 📧 Email: [arefshojaei82@gmail.com](mailto:arefshojaei82@gmail.com)
- 🐙 GitHub: [@ArefShojaei](https://github.com/ArefShojaei)
- 📦 Packagist: [arefshojaei/kitdash](https://packagist.org/packages/arefshojaei/redis)

---

# ⭐ Show Your Support

If this project helps you learn database internals or PHP system development, consider giving it a Star ⭐ on GitHub.

Your support motivates future improvements.
