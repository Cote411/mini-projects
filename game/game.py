#creating tetris with pygame
#imports
import pygame
import random
import time
import sys
import os

#initializing pygame
pygame.init()
#creating the screen
screen = pygame.display.set_mode((800, 700))
#setting the caption
pygame.display.set_caption("Tetris")
#setting the icon
icon = pygame.image.load('tetris.png')
pygame.display.set_icon(icon)
#setting the background
background = pygame.image.load('background.png')
#setting the font
font = pygame.font.SysFont('comicsans', 30, True)
#setting the clock
clock = pygame.time.Clock()

#setting the colors
white = (255, 255, 255)
black = (0, 0, 0)
cyan = (0, 255, 255)
yellow = (255, 255, 0)
purple = (255, 0, 255)
green = (0, 255, 0)
red = (255, 0, 0)
blue = (0, 0, 255)
orange = (255, 165, 0)
colors = [cyan, yellow, purple, green, red, blue, orange]

#setting the variables
score = 0
level = 1
lines = 0
fall_time = 0
fall_speed = 0.27
fps = 60
rows = 20
cols = 10
block_size = 30
grid = []

#setting the shapes
s_shapes = [[[0, 1, 1],
             [1, 1, 0],
             [0, 0, 0]],
            [[0, 1, 0],
             [0, 1, 1],
             [0, 0, 1]]]
z_shapes = [[[2, 2, 0],
             [0, 2, 2],
             [0, 0, 0]],
            [[0, 0, 2],
             [0, 2, 2],
             [0, 2, 0]]]
i_shapes = [[[0, 0, 0, 0],
             [3, 3, 3, 3],
             [0, 0, 0, 0],
             [0, 0, 0, 0]],
            [[0, 0, 3, 0],
             [0, 0, 3, 0],
             [0, 0, 3, 0],
             [0, 0, 3, 0]]]

################################
