<html>

	<head>
		<title>PHP实现计算器功能</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	</head>

<?php
	//计算器程序
	$num1 = true;
	$num2 = true;
	$numa = true;
	$numb = true;

	$message = "";

	if (isset($_GET["operator"])) {
		if ($_GET["num1"] == "") {
			$num1 = false;
			$message = "第一个运算数不能为空";
		}elseif (!is_numeric($_GET["num1"])) {
			$numa = false;
			$message = "第一个运算数不是数字";
		}elseif ($_GET["num2"] == "") {
			$num2 = false;
			$message = "第二个运算数不能为空";
		}elseif (!is_numeric($_GET['num2'])) {
			$numb = false;
			$message = '第二个运算数不是数字';
		}
	}

	if ($num1 && $num2 && $numa && $numb) {
		$result = 0;

		switch ($_GET['operator']) {
			case '+':
				$result = $_GET['num1'] + $_GET['num2'];
				break;
			case '-':
				# code...
				$result = $_GET['num1'] - $_GET['num2'];
				break;
			case 'x':
				# code...
				$result = $_GET['num1'] * $_GET['num2'];
				break;
			case '/':
				# code...
				$result = $_GET['num1'] / $_GET['num2'];
				break;
			case '%':
				# code...
				$result = $_GET['num1'] % $_GET['num2'];
				break;
			
			default:
				# code...
				break;
		}
	}

?>
	<body>
		<table align="center" border="1" width="500">
			<caption><h1>计算器程序</h1></caption>
			<form action="culculator.php">
			<tr>
				<td>
					<input type="text" size="5" name="num1" value="<?php echo $_GET["num1"] ?>">
				</td>
				<td>
					<select name="operator">
						<option value="+" <?php if ($_GET["operator"] == "+") {
							echo "selected";
						} ?>>+</option>
						<option value="-" <?php if ($_GET["operator"] == "-") {
							echo "selected";
						}?>>-</option>
						<option value="x" <?php if ($_GET["operator"] == "x") {
							echo "selected";
						}?>>x</option>
						<option value="/" <?php if ($_GET["operator"] == "/") {
							echo "selected";
						} ?>>/</option>
						<option value="%" <?php if ($_GET["operator"] == "%") {
							echo "selected";
						} ?>>%</option>
					</select>
				</td>
				<td>
					<input type="text" size="5" name="num2" value="<?php echo $_GET["num2"];?>">
				</td>
				<td>
					<input type="submit" size="5" name="result" value="计算">
				</td>
			</tr>

			<?php
				if (isset($_GET["result"])) {
					echo '<tr><td colspan="5">';
					if ($num1 && $num2 && $numa && $numb) {
						echo "结果为：".$_GET["num1"]." ".$_GET["operator"]." ".$_GET["num2"]." = ".$result;
					}else{
						echo $message;
					}
					echo "</td></tr>";
				}
			?>
			</form>
		</table>
		

	</body>

</html>