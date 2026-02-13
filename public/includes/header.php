<?php defined('BASEPATH') || die("Permission deined!"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Redis Explorer</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            redis: {
              DEFAULT: '#DC2626',
              900: '#991B1B',
              800: '#B91C1C',
            },
            slate: {
              950: '#020617',
              900: '#0f172a',
              800: '#1e293b',
              700: '#334155',
            }
          },
          fontFamily: {
            sans: ['Inter var', 'system-ui', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      background: linear-gradient(to bottom right, #020617, #0f172a);
      background-attachment: fixed;
    }
    .glass {
      background: rgba(30, 41, 59, 0.45);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.08);
    }
    .card-hover:hover {
      transform: translateY(-3px);
      transition: all 0.25s ease;
    }
  </style>
</head>
<body class="text-slate-100 min-h-screen antialiased">
  <!-- Header -->
  <header class="border-b border-slate-800/60 bg-slate-950/40 backdrop-blur-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <i class="fa-solid fa-database text-redis text-3xl"></i>
        <h1 class="text-2xl font-bold bg-gradient-to-r from-redis to-red-400 bg-clip-text text-transparent">
          Redis Explorer
        </h1>
      </div>
      <div class="text-sm opacity-70">
        <i class="fa-solid fa-circle text-green-400 text-xs mr-1.5"></i>
        Static mock view
      </div>
    </div>
  </header>