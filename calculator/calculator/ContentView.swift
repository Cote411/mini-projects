//
//  ContentView.swift
//  calculator
//
//  Created by Alex Cote on 12/4/23.
//

import SwiftUI
import UIKit

struct ContentView: View {
  @State private var number1 = ""
  @State private var number2 = ""
  @State private var result = ""
  @State private var errorMessage = ""
  @AppStorage("isDarkMode") private var isDarkMode = false

  var body: some View {
    VStack {
      Toggle(isOn: $isDarkMode) {
        Text("Dark Mode")
      }
      .padding()

      TextField("Number 1", text: $number1)
        .keyboardType(.numbersAndPunctuation)
        .padding()

      TextField("Number 2", text: $number2)
        .keyboardType(.numbersAndPunctuation)
        .padding()

      Text(errorMessage)
        .foregroundColor(.red)

      Button(action: {
        if let num1 = Double(number1), let num2 = Double(number2) {
          result = String(num1 + num2)
          errorMessage = ""
        } else {
          errorMessage = "Invalid input"
        }
      }) {
        Text("Add")
      }
      .padding()
      .background(Color.blue)
      .foregroundColor(.white)
      .cornerRadius(10)

      Button(action: {
        if let num1 = Double(number1), let num2 = Double(number2) {
          result = String(num1 - num2)
          errorMessage = ""
        } else {
          errorMessage = "Invalid input"
        }
      }) {
        Text("Subtract")
      }
      .padding()
      .background(Color.blue)
      .foregroundColor(.white)
      .cornerRadius(10)

      Button(action: {
        if let num1 = Double(number1), let num2 = Double(number2) {
          result = String(num1 * num2)
          errorMessage = ""
        } else {
          errorMessage = "Invalid input"
        }
      }) {
        Text("Multiply")
      }
      .padding()
      .background(Color.blue)
      .foregroundColor(.white)
      .cornerRadius(10)

      Button(action: {
        if let num1 = Double(number1), let num2 = Double(number2) {
          if num2 != 0 {
            result = String(num1 / num2)
            errorMessage = ""
          } else {
            errorMessage = "Cannot divide by zero"
          }
        } else {
          errorMessage = "Invalid input"
        }
      }) {
        Text("Divide")
      }
      .padding()
      .background(Color.blue)
      .foregroundColor(.white)
      .cornerRadius(10)

      Button(action: {
        number1 = ""
        number2 = ""
        result = ""
        errorMessage = ""
      }) {
        Text("Clear")
      }
      .padding()
      .background(Color.blue)
      .foregroundColor(.white)
      .cornerRadius(10)

      Button(action: {
        if let num1 = Double(number1) {
          if num1 >= 0 {
            result = String(sqrt(num1))
            errorMessage = ""
          } else {
            errorMessage = "Cannot calculate the square root of a negative number"
          }
        } else {
          errorMessage = "Invalid input"
        }
      }) {
        Text("Square Root")
      }
      .padding()
      .background(Color.blue)
      .foregroundColor(.white)
      .cornerRadius(10)

      Text("Result: \(result)")
    }
    .preferredColorScheme(isDarkMode ? .dark : .light)
    .padding()
    .alert(isPresented: Binding<Bool>(
      get: { !errorMessage.isEmpty },
      set: { _ in errorMessage = "" }
    )) {
      Alert(
        title: Text("Calculation Error"),
        message: Text(errorMessage),
        primaryButton: .destructive(Text("Reset")) {
          number1 = ""
          number2 = ""
          result = ""
          errorMessage = ""
        },
        secondaryButton: .cancel(Text("Dismiss")) {
          errorMessage = ""
        }
      )
    }
  }
}

#Preview {
    ContentView()
}
