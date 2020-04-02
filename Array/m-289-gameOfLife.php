<?php
# https://leetcode-cn.com/problems/game-of-life/
/**
 * @Time: 2020/4/2 12:31
 * @DESC: 289. 生命游戏
 * 给定一个包含 m × n 个格子的面板，每一个格子都可以看成是一个细胞。每个细胞都具有一个初始状态：1 即为活细胞（live），或 0 即为死细胞（dead）。每个细胞与其八个相邻位置（水平，垂直，对角线）的细胞都遵循以下四条生存定律：
 * 如果活细胞周围八个位置的活细胞数少于两个，则该位置活细胞死亡；
 * 如果活细胞周围八个位置有两个或三个活细胞，则该位置活细胞仍然存活；
 * 如果活细胞周围八个位置有超过三个活细胞，则该位置活细胞死亡；
 * 如果死细胞周围正好有三个活细胞，则该位置死细胞复活；
 *
 * 根据当前状态，写一个函数来计算面板上所有细胞的下一个（一次更新后的）状态。下一个状态是通过将上述规则同时应用于当前状态下的每个细胞所形成的，其中细胞的出生和死亡是同时发生的。
 * @param $board
 * @return mixed
 */
function gameOfLife(&$board){
    $arr = $board;
    for ($i = 0; $i < count($arr); $i++){
        for ($j = 0; $j < count($arr[0]); $j++){
            $a = 0;
            # 看着复杂其实还好.. 4ms
            ($arr[$i-1][$j-1] ?? 0) == 1 ? $a++ : null;
            ($arr[$i][$j-1] ?? 0) == 1 ? $a++ : null;
            ($arr[$i+1][$j-1] ?? 0) == 1 ? $a++ : null;
            ($arr[$i-1][$j] ?? 0) == 1 ? $a++ : null;
            ($arr[$i+1][$j] ?? 0) == 1 ? $a++ : null;
            ($arr[$i-1][$j+1] ?? 0) == 1 ? $a++ : null;
            ($arr[$i][$j+1] ?? 0) == 1 ? $a++ : null;
            ($arr[$i+1][$j+1] ?? 0) == 1 ? $a++ : null;

            if ($board[$i][$j] == 1 && ($a < 2 || $a > 3)){
                $board[$i][$j] = 0;
            }
            if ($board[$i][$j] == 0 && ($a == 3)){
                $board[$i][$j] = 1;
            }
        }
    }
    return $board;
}


$board = [
    [0,1,0],
    [0,0,1],
    [1,1,1],
    [0,0,0]
];
print_r(gameOfLife($board));