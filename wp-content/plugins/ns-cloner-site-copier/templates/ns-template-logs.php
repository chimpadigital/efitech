<?php
/**
 * Template for the logs management page
 *
 * @package NS_Cloner
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Delete logs if submitted.
if ( ns_cloner_request()->get( 'delete_logs' ) && ns_cloner()->check_permissions() ) {
	ns_cloner()->log->delete_logs();
}

?>

<div class="ns-cloner-header">
	<a href="<?php echo esc_url( network_admin_url( 'admin.php?page=' . ns_cloner()->menu_slug ) ); ?>">
		<img src="<?php echo esc_url( NS_CLONER_V4_PLUGIN_URL . 'images/ns-cloner-top-logo.png' ); ?>" alt="NS Cloner" />
	</a>
	<span>/</span>
	<h1><?php esc_html_e( 'Logs & Status', 'ns-cloner' ); ?></h1>
</div>

<div class="ns-cloner-wrapper">

	<form class="ns-cloner-form ns-cloner-logs-form" method="post">

		<div class="ns-cloner-section">
			<div class="ns-cloner-section-header">
				<h4><?php esc_html_e( 'Scheduled Operations', 'ns-cloner' ); ?></h4>
			</div>
			<div class="ns-cloner-section-content">
				<?php if ( empty( ns_cloner()->schedule->get() ) ) : ?>
					<h5><?php esc_html_e( 'No scheduled cloning operations.', 'ns-cloner' ); ?></h5>
				<?php else : ?>
					<table class="ns-cloner-ops-table">
						<tr>
							<th class="date-col"><?php esc_html_e( 'Scheduled', 'ns-cloner' ); ?></th>
							<th><?php esc_html_e( 'Type', 'ns-cloner' ); ?></th>
							<th><?php esc_html_e( 'Created', 'ns-cloner' ); ?></th>
							<th class="action-col"><?php esc_html_e( 'View', 'ns-cloner' ); ?></th>
							<th class="action-col"><?php esc_html_e( 'Delete', 'ns-cloner' ); ?></th>
						</tr>
						<?php foreach ( ns_cloner()->schedule->get() as $i => $data ) : ?>
							<tr data-index="<?php echo esc_attr( $i ); ?>">
								<td>
									<?php echo esc_html( date( 'r', $data['_scheduled'] ) ); ?>
								</td>
								<td>
									<?php $mode = ns_cloner()->get_mode( $data['clone_mode'] ); ?>
									<?php echo esc_html( $mode ? $mode->title : $data['clone_mode'] ); ?>
								</td>
								<td class="date-col">
									<?php echo esc_html( date( 'Y-m-d H:i', $data['_created'] ) ); ?>
									via <?php echo esc_html( $data['_caller'] ); ?>
								</td>
								<td>
									<button class="button ns-cloner-scheduled-view" data-cloner-modal="<?php echo esc_attr( "op_$i" ); ?>">
										<?php esc_html_e( 'View', 'ns-cloner' ); ?>
									</button>
									<div class="ns-cloner-extra-modal" id="<?php echo esc_attr( "op_$i" ); ?>">
										<div class="ns-cloner-extra-modal-content">
											<pre><?php echo esc_html( print_r( $data, true ) ); ?></pre>
											<button class="button ns-cloner-form-button close">Close</button>
										</div>
									</div>
								</td>
								<td>
									<button class="button ns-cloner-scheduled-delete" data-index="<?php echo esc_attr( $i ); ?>">
										<?php esc_html_e( 'Delete', 'ns-cloner' ); ?>
									</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				<?php endif; ?>
				<p class="description">
					<?php esc_html_e( 'Scheduled operations are created when someone clicks the clone button while another cloning operation is still running.', 'ns-cloner' ); ?>
					<?php esc_html_e( 'They may also be created via the command line or by frontend cloning (from member registrations) with Cloner Pro.', 'ns-cloner' ); ?>
				</p>
			</div>
		</div>

		<div class="ns-cloner-section">
			<div class="ns-cloner-section-header">
				<h4><?php esc_html_e( 'Manage Logs', 'ns-cloner' ); ?></h4>
			</div>
			<div class="ns-cloner-section-content">
				<?php if ( empty( ns_cloner()->log->get_logs() ) ) : ?>
					<h5><?php esc_html_e( 'No logs currently saved.', 'ns-cloner' ); ?></h5>
				<?php else : ?>
					<p>
						<?php esc_html_e( 'Logs may contain sensitive information from your database, so it\'s good security practice to clear them once no longer needed.', 'ns-cloner' ); ?>
						<?php esc_html_e( 'Make sure that you don\'t need them for support or debugging, though, because they will be deleted permanently once cleared.', 'ns-cloner' ); ?>
					</p>
					<p>
						<input type="submit" name="delete_logs" class="button ns-cloner-form-button large" value="<?php esc_attr_e( 'Delete All Logs', 'ns-cloner' ); ?>" />
					</p>
				<?php endif; ?>
			</div>
		</div>

		<div class="ns-cloner-section">
			<div class="ns-cloner-section-header">
				<h4><?php esc_html_e( 'View Logs', 'ns-cloner' ); ?></h4>
			</div>
			<div class="ns-cloner-section-content">
				<?php if ( empty( ns_cloner()->log->get_logs() ) ) : ?>
					<h5><?php esc_html_e( 'No logs currently saved.', 'ns-cloner' ); ?></h5>
				<?php else : ?>
					<table class="ns-cloner-logs-table">
						<tr>
							<th class="date-col"><?php esc_html_e( 'Date', 'ns-cloner' ); ?></th>
							<th><?php esc_html_e( 'Log File', 'ns-cloner' ); ?></th>
							<th><?php esc_html_e( 'Size', 'ns-cloner' ); ?></th>
							<th class="action-col"><?php esc_html_e( 'View', 'ns-cloner' ); ?></th>
						</tr>
						<?php foreach ( ns_cloner()->log->get_logs() as $log ) : ?>
							<tr>
								<td>
									<?php echo esc_html( date( 'r', $log['date'] ) ); ?>
								</td>
								<td>
									<a href="<?php echo esc_url( $log['url'] ); ?>" target="_blank">
										<?php echo esc_html( basename( $log['url'] ) ); ?>
									</a>
								</td>
								<td>
									<?php echo esc_html( $log['size'] ); ?>
								</td>
								<td>
									<a class="button" href="<?php echo esc_url( $log['url'] ); ?>" target="_blank">
										<?php esc_html_e( 'View Log', 'ns-cloner' ); ?>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				<?php endif; ?>
			</div>
		</div>

		<div class="clear"></div>
		<input type="hidden" name="clone_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ns_cloner' ) ); ?>" />

	</form>

	<?php ns_cloner()->render( 'sidebar-sub' ); ?>

</div>
