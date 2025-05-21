// Copyright (c) 2025 Isaaq Simon All rights reserved
//
// Created by: Isaaq Simon
// Created on: Mar 2025
// This file contains the JS functions for index.php
// Placeholder for future enhancements
// You can add real-time price calculations or validation here

// Example: alert when both fields are selected
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    form.addEventListener("submit", function (e) {
      const size = document.getElementById("size").value;
      const type = document.getElementById("type").value;
  
      if (!size) {
        alert("Please select a size before submitting.");
        e.preventDefault();
      }
    });
  });